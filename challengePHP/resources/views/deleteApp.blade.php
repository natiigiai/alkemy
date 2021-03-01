<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Baja de una aplicación') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @if(Auth::user()->tieneRol(1))
                <div class="row alert bg-light border-danger col-8 mx-auto p-2 m-4">
                    <div class="col">
                        <img src="/aplicaciones/{{$aplicacion->appImg}}" alt="" class="img-thumbnail">
                    </div>
                    <div class="col text-danger align-self-center">
                        <form action="/deleteApp" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="appId" value="{{$aplicacion->appId}}">
                            <input type="hidden" name="appName" value="{{$aplicacion->appName}}">
                            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                            <strong>{{$aplicacion->appName}}</strong>
                            <br>
                            Categoría: {{$aplicacion->relCategory->catName}}
                            <br>
                            Precio: ${{$aplicacion->appPrice}}
                            <br>
                            <button class="btn btn-danger btn-block my-3">Confirmar baja</button>
                            <a href="/me/apps/{{Auth::user()->id}}" class="btn btn-secondary btn-block">Volver al listado de aplicaciones</a>

                        </form>
                    </div>
                </div>
            @else

                <div class="alert alert-danger">
                    Debe tener rol de desarrollador para poder eliminar una aplicación
                    <a href="/me/apps/{{Auth::user()->id}}" class="btn btn-outline-secondary mb-3">Volver al listado de aplicaciones</a>
                </div>
            @endif
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</x-app-layout>
