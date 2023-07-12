<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-4xl font-bold text-center mb-10">Mis notificaciones</h1>
                    @forelse ( $notificaciones as $notificacion)
                        <div class="p-5 border rounded-md border-gray-600 lg:flex lg:justify-between lg:items-center">
                            <div class="">
                                <p class="">Tienes un nuevo candidato en:
                                    <span class="font-bold"> {{ $notificacion->data['nombre_vacante'] }} </span>
                                </p>
                                <p class="">
                                    <span class="font-bold"> {{ $notificacion->created_at->diffForHumans() }} </span>
                                </p>
                            </div>
                            <div class="mt-5 lg:mt-0">
                                <a href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}" class="bg-teal-500 p-2 text-sm uppercase font-semibold rounded-md">
                                    Ver candidatos
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-300">
                            Cielos esta vacio por aqui
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
