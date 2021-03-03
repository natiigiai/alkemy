<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ApplicationController extends Controller
{

    public function indexApp(){
        $aplicaciones = Application::paginate(10);
        return view('welcome', ['aplicaciones'=>$aplicaciones]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aplicaciones = Application::with('relUser','relCategory')->paginate(10);
        return view('apps',['aplicaciones'=>$aplicaciones]);
    }

    public function appsPorRol($id){
        $appsDesarrollador = Application::with('relUser','relCategory')->where('userId',$id)->paginate(10);
        $appsCliente = Purchase::with('relApp','relCliente')->where('userId',$id)->paginate(10);
        return view('apps',['appsDesarrollador'=>$appsDesarrollador, 'appsCliente'=>$appsCliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::all();
        return view('newApp',['categorias'=>$categorias]);

    }

    private function validar(Request $request){
        $request->validate(
            [
                'appName'=>'required|min:3|max:70',
                'appPrice'=>'required|numeric|min:0',
                'appImg'=>'mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
            ],
            [
                'appName.required'=>'Complete el campo Nombre',
                'appName.min'=>'Complete el campo Nombre con al menos 3 caractéres',
                'appName.max'=>'Complete el campo Nombre con 70 caractéres como máxino',
                'appPrice.required'=>'Complete el campo Precio',
                'appPrice.numeric'=>'Complete el campo Precio con un número',
                'appPrice.min'=>'Complete el campo Precio con un número positivo',
                'appImg.mimes'=>'Debe ser una imagen',
                'appImg.max'=>'Debe ser una imagen de 2MB como máximo'
            ]
        );
    }

    private function subirImagen(Request $request){
        //si no enviaron imagen - store()
        $appImg = 'noDisponible.jpg';

        //si no enviaron imagen - update()
        if ($request->has('imgActual')){ //igual que isset
            $appImg = $request->imgActual;
        }

        //si enviaron imagen
        if($request->file('appImg')){
            //renombrar
            #nombre original--> $request->file('prdImagen')->getClientOriginalName();
            #time().'.'.entensión
            $appImg = time().'.'.$request->file('appImg')->clientExtension();
            //subir archivo en directorio 'aplicaciones'
            $request->file('appImg')
                ->move(public_path('aplicaciones/'), $appImg); //1° parametro en donde, 2° nombre imagen
        }
        return $appImg;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validar($request);
        $appImg = $this->subirImagen($request);
        //instanciamos
        $Aplicacion = new Application();
        //asignamos atributos
        $Aplicacion->appName = $request->appName;
        $Aplicacion->appPrice = $request->appPrice;
        $Aplicacion->categoryId = $request->categoryId;
        $Aplicacion->userId = $request->userId;
        $Aplicacion->appImg = $appImg;
        //guardar
        $Aplicacion->save();
        //redireccion con mensaje de ok
        return redirect('/me/apps/'.$Aplicacion->userId)
            ->with('mensaje', 'Aplicación: '.$Aplicacion->appName.' agregada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aplicacion = Application::with('relUser', 'relCategory')->find($id);
        return view('showApp',
            [
                'aplicacion'=>$aplicacion,
            ]);
    }

    public function buy( Request $request)
    {
        $mensaje = 'Usted ya compro la aplicación '.$request->name.'.';
        $compra = new Purchase();
        $compra->appId = $request->appId;
        $compra->userId = $request->userId;
        $comprada = Purchase::where('userId', $compra->userId)->where('appId',$compra->appId)->get()->count();
        if($comprada == 0){
            $compra->save();
            $mensaje = 'Ha comprado la aplicación: '.$request->appName.'.';

        }
        return redirect('/me/apps/'.$compra->userId)
            ->with('mensaje', $mensaje);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = Category::all();
        $Aplicacion = Application::with('relUser','relCategory')->find($id);
        return view('editApp',
            [
                'categorias'=>$categorias,
                'Aplicacion'=>$Aplicacion
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //validacion
        $this->validar($request);
        //obtenemos datos
        $Aplicacion = Application::find($request->appId);
        //sobreescritura
        $Aplicacion->appId = $request->appId;
        $Aplicacion->appName = $request->appName;
        $Aplicacion->userId = $request->userId;
        $Aplicacion->appPrice = $request->appPrice;
        $Aplicacion->categoryId = $request->categoryId;
        //guardar imagen si enviaron
        $Aplicacion->appImg = $this->subirImagen($request);
        //guardamos
        $Aplicacion->save();
        //retornamos con mensaje de ok
        return redirect('/me/apps/'.$Aplicacion->userId)
            ->with('mensaje', 'Aplicación: '.$Aplicacion->appName.' modificada correctamente.');

    }

    public function confirm($id){
        //obtenemos datos de la aplicacion por id
        $aplicacion = Application::with('relUser', 'relCategory')->find($id);
        //retornamos vista de confirmacion de baja
        return view('deleteApp', ['aplicacion'=>$aplicacion]);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //capturamos datos
        $appId = $request->appId;
        $appName = $request->appName;
        $userId = $request->userId;
        Application::destroy($appId);
        //redireccion con mensaje de ok
        return redirect('/me/apps/'.$userId)
            ->with('mensaje', 'Aplicación: '.$appName.' eliminada correctamente.');
    }
}
