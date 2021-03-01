<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aplicaciones') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="row m-2">
                <div class="card col-sm-6 col-md-3 col-lg-4 m-1">
                    <div class="col">
                        <img src="/aplicaciones/{{$aplicacion->relApp->appImg}}" class="img-thumbnail">
                    </div>
                    <div class="col">
                        <h2>{{$aplicacion->relApp->appName}}</h2>
                        Categoría: {{$aplicacion->relApp->relCategory->catName}}<br>
                        Desarrollada por: {{$aplicacion->relApp->relUser->name}}<br>
                        Precio: ${{$aplicacion->relApp->appPrice}}<br>
                        <a href="/me/apps/{{Auth::user()->id}}" class="btn btn-secondary btn-block m-2">Volver al listado de aplicaciones</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</x-app-layout>
