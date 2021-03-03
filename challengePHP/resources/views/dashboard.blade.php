<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!--<x-jet-welcome />-->
                @if(Auth::check())
                    @if(Auth::user()->tieneRol(1))
                        <div class="list-group">
                            <a href="/apps" class="list-group-item list-group-item-action">Aplicaciones</a>
                            <a href="me/apps/{{Auth::user()->id}}" class="list-group-item list-group-item-action">Mis aplicaciones</a>
                        </div>
                    @endif
                    @if(Auth::user()->tieneRol(2))
                        <div class="list-group">
                            <a href="/apps" class="list-group-item list-group-item-action">Aplicaciones</a>
                            <a href="me/apps/{{Auth::user()->id}}" class="list-group-item list-group-item-action">Mis aplicaciones</a>
                            <a href="/me/categories" class="list-group-item list-group-item-action">Categorías</a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
