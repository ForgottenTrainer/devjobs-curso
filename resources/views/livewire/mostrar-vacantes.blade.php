<div> 
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center">
                <div class="leading-10">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-500 font-bold ">{{ $vacante->empresa }}</p>
                    <p class="text-sm text-gray-400 ">Ultimo dia: {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
                </div>
                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a href="{{ route('candidatos.index', $vacante) }}" class="bg-slate-600 text-center px-4 py-2 mt-2 rounded-lg text-white text-xs font-bold uppercase">
                        Candidatos <span class="">{{ $vacante->candidatos->count() }}</span>
                    </a>
                    <a href="{{ route('vacantes.edit', $vacante->id) }}" class="bg-blue-600 text-center px-4 py-2 mt-2 rounded-lg text-white text-xs font-bold uppercase">
                        Editar
                    </a>
                    <button wire:click="$emit('motrar-alerta', {{ $vacante->id }})" class="bg-red-600 text-center px-4 py-2 mt-2 rounded-lg text-white text-xs font-bold uppercase">
                    Eliminar
                    </button>
                </div>
            </div> 
        @empty

        <p class="p-3 text-center text-sm text-gray-400">No hay vacantes</p>
            
        @endforelse

    </div>

    <div class="flex justify-center mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    Livewire.on('motrar-alerta', vacanteId => {
        Swal.fire({
            title: '¿Eliminar vacante',
            text: "Esta acción es irreversible",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si eliminalo'
            }).then((result) => {
            if (result.isConfirmed) {
                //Eliminar desde el servidor

                Livewire.emit('eliminarVacante', vacanteId)

                Swal.fire(
                'Excelente se ha eliminado',
                'Tu vacante ya no existe',
                'success'
                )
            }
        })
    })


</script>

@endpush