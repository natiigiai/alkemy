<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aplicaciones') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="row atert bg-light border-dark col-8 mx-auto p-2 m-4">
                    <div class="col">
                        <img src="/aplicaciones/{{$aplicacion->appImg}}" class="img-thumbnail">
                    </div>
                    <div class="col align-self-center">
                        <strong>{{$aplicacion->appName}}</strong>
                        Categoría: {{$aplicacion->relCategory->catName}}<br>
                        Desarrollada por: {{$aplicacion->relUser->name}} <br>
                        Precio: ${{$aplicacion->appPrice}}<br>
                        @if(Auth::check())
                            @if(Auth::user()->tieneRol(2))
                                        <form action="/buy" method="POST">
                                            @csrf
                                            <input type="hidden" name="appId" value="{{$aplicacion->appId}}">
                                            <input type="hidden" name="appName" value="{{$aplicacion->appName}}">
                                            <input type="hidden" name="userId" value="{{Auth::user()->id}}">
                                            <button class="btn btn-dark mb-3">Comprar!</button>
                                        </form>
                            @endif
                        @endif
                    </div>
                </div>
            <a href="/apps" class="btn btn-secondary m-2">Volver al listado de aplicaciones</a>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</x-app-layout>
