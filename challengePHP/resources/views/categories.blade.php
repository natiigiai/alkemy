<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorías') }}
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
                                    <th>#</th>
                                    <th>Categoría</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categorias as $cat)
                                    <tr>
                                        <td>{{$cat->categoryId}}</td>
                                        <td>{{$cat->catName}}</td>
                                        <td>
                                            <a href="/showApps/{{$cat->categoryId}}" class="btn btn-outline-secondary">Ver aplicaciones</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$categorias->links()}}
                        @endif
                @endif
            </div>
        </div>
    </div>



</x-app-layout>
