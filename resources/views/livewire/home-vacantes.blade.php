<div>

    <livewire:filtrar-vacantes />

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 mb-12 text-center">
                Nuestras Vacantes Disponibles
            </h3>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-300">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a 
                                class="text-3xl text-gray-600 font-extrabold" 
                                href="{{route('vacantes.show', $vacante->id)}}">
                                {{$vacante->titulo}}
                            </a>
                            <p class="text-base text-gray-600 mb-1">{{$vacante->empresa}}</p>
                            <p class="text-xs text-gray-600 mb-1">{{$vacante->categoria->categoria}}</p>
                            <p class="text-base text-gray-600 mb-1">{{$vacante->salario->salario}}</p>
                            <p class="font-bold text-xs text-gray-600">
                                Último dia para postularse:
                                <span class="font-normal">{{$vacante->ultimo_dia->format('d/m/Y')}}</span>
                            </p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a 
                                href="{{route('vacantes.show', $vacante->id)}}"
                                class="bg-indigo-800 py-2 px-4 rounded-lg text-white text-xs font-bold  block text-center"
                            >
                                Ver Vacante
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3  text-sm text-gray-600 font-extrabold text-center">No hay vacantes aun</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
