<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div class="p-6 text-gray-900 md:flex md:justify-between md:items-center">
                <div class="space-y-5">
                    <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">{{$vacante->empresa}}</p>
                    <p class="text-sm text-gray-500">Último dia: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
                </div>
                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a 
                        href="{{route('candidatos.index', $vacante)}}"
                        class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold text-center"
                    >
                        {{$vacante->candidatos->count()}}
                        Candidatos
                    </a>
                    <a 
                        href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold text-center"
                    >Editar</a>
                    <button
                        wire:click="$dispatch('mostrarAlerta', {{ $vacante->id }})"
                        class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold text-center"
                    >Eiminar</button>
                </div> 
            </div> 
     
        @empty
            <p class="text-sm text-gray-600 text-center p-3">No hay Vacantes</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{$vacantes->links()}}
    </div>
</div>
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        
        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
                title: '¿Eliminar Vacante?',
                text: "Una vacante eliminada no se puede recuperar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡Elliminar!',
                cancelButtonText: 'Cancelar'
              }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('eliminarVacante', {vacante: vacanteId});
                    Swal.fire(
                        'Se eliminó la Vacante!',
                        'Eliminado Correctamente',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
