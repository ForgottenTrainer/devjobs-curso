<div>
    {{-- Be like water. --}}
    <livewire:filtrar-vacantes />
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-300 mb-12">
                Nuestras vacantes disponibles
            </h3>
            <div class="shadow-md rounded-lg p-6 bg-slate-600  divide-y divide-gray-300">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center p-6">
                        <div class="md:flex-1">
                            <a class="font-bold text-2xl text-white"  href="{{ route('vacantes.show', $vacante->id) }}">
                                {{ $vacante->titulo }}
                            </a>
                            <p class="text-base text-gray-300">{{ $vacante->empresa }}</p>
                            <p class="text-base text-gray-300">Ultimo dia para postularse 
                                <span class="font-bold">{{ $vacante->ultimo_dia->format('d/m/Y') }}</span>
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0 ">
                            <a class="bg-indigo-600 block text-center shadow-md p-3 text-sm font-bold text-white rounded-md" href="{{ route('vacantes.show', $vacante->id) }}">
                                Ver mas
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-white uppercase">
                        Cielos aun no se encuentran vacantes
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
