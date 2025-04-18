<?php

namespace App\Livewire;

use App\Models\Vacante;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MostrarVacantes extends Component
{
    // protected $listeners = ["eliminarVacante"];
    // public function prueba()
    // {
    //     dd('Desde prueba');
    // }
    
    protected $listeners = ['eliminarVacante' => 'eliminarVacante'];
    // #[On('eliminarVacante')]
    public function eliminarVacante(Vacante $vacante)
    {
        // $vacante->delete();
        // dd($vacante->titulo);

        // Compruebo Policy
        //Usamos Gate ahora para los Policies
        Gate::authorize('delete', $vacante);
        // $this->authorize('delete', $vacante);

        // Elimino Imagen
        $result = Storage::delete('public/vacantes/'.$vacante->imagen);
        // Elimino Vacante

        $vacante->delete();
    }
    public function render()
    {
        //Consultamos la DB
        $vacantes = Vacante::where('user_id', Auth::user()->id)->paginate(1);

        return view('livewire.mostrar-vacantes',[
            'vacantes' => $vacantes
        ]);
    }
}
