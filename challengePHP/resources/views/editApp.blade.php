<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modificación de datos de una aplicación') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @if(Auth::user()->tieneRol(1))
                <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4 mt-4">

                    <form action="/editApp" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="appId" value="{{$Aplicacion->appId}}">
                        <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                        Nombre: <br>
                        <input type="text" name="appName" value="{{$Aplicacion->appName}}" class="form-control" readonly>
                        <br>
                        Precio: <br>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text p-2">$</div>
                            </div>
                            <input type="number" step="0.01" name="appPrice" value="{{$Aplicacion->appPrice}}" class="form-control">
                        </div>
                        <br>
                        Categoría: <br>
                        <input type="hidden" name="categoryId" value="{{$Aplicacion->relCategory->categoryId}}">
                        <select name="category" class="form-control" disabled>
                            <option value="{{$Aplicacion->relCategory->categoryId}}">{{$Aplicacion->relCategory->catName}}</option>
                            @foreach($categorias as $categoria)
                                <option {{(old('categoryId')==$categoria->categoryId)?'selected':''}} value="{{$categoria->categoryId}}">{{$categoria->catName}}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        Imagen actual: <br>
                        <img src="/aplicaciones/{{$Aplicacion->appImg}}" alt="" class="img-thumbnail m-4">
                        <input type="hidden" name="imgActual" value="{{$Aplicacion->appImg}}">
                        <br>
                        Modificar imagen: <br>
                        <div class="custom-file mt-1 mb-4">
                            <input type="file" name="appImg"  class="custom-file-input" id="customFileLang" lang="es">
                            <label class="custom-file-label" for="customFileLang" data-browse="Buscar en disco">Seleccionar Archivo: </label>
                        </div>

                        <br>
                        <button class="btn btn-dark mb-3">Modificar Aplicación</button>
                        <a href="/me/apps/{{Auth::user()->id}}" class="btn btn-outline-secondary mb-3">Volver al listado de aplicaciones</a>
                    </form>

                </div>

                @if($errors->any())
                    <div class="alert alert-danger col-8 mx-auto p-3">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @else
                <div class="alert alert-danger">
                    Debe tener rol de desarrollador para poder agregar una nueva aplicación
                    <a href="/me/apps/{{Auth::user()->id}}" class="btn btn-outline-secondary mb-3">Volver al listado de aplicaciones</a>
                </div>
            @endif
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</x-app-layout>
