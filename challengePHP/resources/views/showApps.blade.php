<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categoría: {{$categoria->catName }}
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
                        @if(Auth::user()->tieneRol(2))
                            <table class="table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Aplicacion</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($aplicaciones as $app)
                                    <tr>
                                        <td>{{$app->appName}}</td>
                                        <td>
                                            <a href="/show/{{$app->appId}}" class="btn btn-outline-secondary">Detalle</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$aplicaciones->links()}}
                        @endif
                @endif
            </div>
            <a href="/me/apps/{{Auth::user()->id}}" class="btn btn-secondary m-2">Volver al listado de aplicaciones</a>
        </div>
    </div>



</x-app-layout>
