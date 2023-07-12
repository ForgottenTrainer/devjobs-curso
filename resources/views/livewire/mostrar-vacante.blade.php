<div class="p-10">
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-500">
            {{ $vacante->titulo }}
        </h3>
        <div class="md:grid md:grid-cols-2 p-4 my-10">
            <p class="font-bold text-sm uppercase text-gray-600 my-3">
                Empresa: <span class="normal-case font-normal text-white">{{ $vacante->empresa }}
                </span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-600 my-3">
                ultimo dia: <span class="normal-case font-normal text-white">{{ $vacante->ultimo_dia->toFormattedDateString() }}
                </span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-600 my-3">
                Categoria: <span class="normal-case font-normal text-white">{{ $vacante->categoria->categoria }}
                </span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-600 my-3">
                Salario: <span class="normal-case font-normal text-white">{{ $vacante->salario->salario }}
                </span>
            </p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2 ">
            <img class="rounded-sm" src="{{ asset('storage/vacantes/'.$vacante->imagen) }}" alt="{{ $vacante->titulo }}">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">
                Descripcion del puesto
            </h2>
            <p> {{ $vacante->descripcion }} </p>
        </div>
    </div>
    @guest
    <div class="mt-5 bg-gray-50 border-dashed p-5 rounded-lg text-center">
        <p class="text-black">¿Deseas postularte? <a class="font-bold text-indigo-600 " href="{{ route('register') }}">Hazte una cuenta para para que puedas postulare</a></p>
    </div>        
    @endguest

    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante"></livewire:postular-vacante>
    @endcannot

</div>
