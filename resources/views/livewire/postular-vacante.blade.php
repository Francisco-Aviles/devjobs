<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    @if (Session()->has('error'))
    <div class="uppercase border border-red-600 bg-red-100 text-red-600 font-bold p-2 my-5">
        {{Session('error')}}
    </div>
    @endif

    @if (Session()->has('mensaje'))
        <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5">
            {{Session('mensaje')}}
        </div>
    @else
        <form class="w-96 mt-5" wire:submit.prevent='postularme'>
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum u Hoja de Vida')"/>
                <x-text-input  wire:model.live="cv" id="cv" type="file" accept=".pdf"    class="block mt-1 w-full"/>
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message"/>
            @enderror

            <x-primary-button class="my-5" >
                {{__('Postularme')}}
            </x-primary-button>
        </form>
    @endif
    
</div>
