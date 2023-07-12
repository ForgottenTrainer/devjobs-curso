

<div class="bg-gray-500 p-5 mt-10 flex flex-col justify-center items-center rounded-md">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <h3 class="text-center text-2xl font-bold my-4 text-gray-100"> Postularse a esta vacante </h3>
    
    @if(session()->has('mensaje'))

    @else
        <form wire:submit.prevent="postularme" class="w-full max-w-sm">
            <div class="flex items-center border-b border-teal-500 py-2">
                <label for="cv" :value="__('Curriculum vitae o hoja de vida en PDF')"></label>
                <input id="CV" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="file" accept=".pdf" wire:model="cv" aria-label="CV" />

                <button type="submit" wire:loading.attr="disabled" wire:target="cv" wire:click="$emit('cv')" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" >
                    Enviar CV
                </button>
            </div>
            @error('cv')
                <livewire:mostrar-alerta :message="$message"  />
            @enderror
        </form>
    @endif

</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('cv', () => {
            if (document.getElementById('CV').value !== '') {
                Swal.fire(
                    '¡Bien hecho!',
                    'Ya lograste postularte, te deseo toda la suerte del mundo.',
                    'success'
                );
            }
        })

    </script>
@endpush
