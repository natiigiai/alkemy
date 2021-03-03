<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis aplicaciones') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if ( session('mensaje') )
                    <div class="alert alert-success">
                        {{ session('mensaje') }}
                    </div>
                @endif
                @if(Auth::check())
                        @if(Auth::user()->tieneRol(1))
                            <table class="table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Aplicación</th>
                                    <th>Categoría</th>
                                    <th colspan="2">
                                        <a href="/newApp" class="btn btn-outline-secondary">
                                            Agregar
                                        </a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($appsDesarrollador as $app)
                                        <tr>
                                            <td>{{$app->appName}}</td>
                                            <td>{{$app->relCategory->catName}}</td>
                                            <td>
                                                <a href="/editApp/{{$app->appId}}" class="btn btn-outline-secondary">Modificar</a>
                                            </td>
                                            <td>
                                                <a href="/deleteApp/{{$app->appId}}" class="btn btn-outline-secondary">Eliminar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$appsDesarrollador->links()}}
                        @elseif(Auth::user()->tieneRol(2))
                            <table class="table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Aplicación</th>
                                    <th>Categoría</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($appsCliente as $app)
                                    <tr>
                                        <td>{{$app->relApp->appName}}</td>
                                        <td>{{$app->relApp->relCategory->catName}}</td>
                                        <td>
                                            <a href="/show/{{$app->relApp->appId}}" class="btn btn-outline-secondary">Detalle</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$appsCliente->links()}}
                        @endif
                @endif
            </div>
        </div>
    </div>



</x-app-layout>
