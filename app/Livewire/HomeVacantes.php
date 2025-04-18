<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    protected $listeners = ['terminosBusqueda' => 'buscar'];
    public $termino, $categoria, $salario;
    public function buscar($termino, $categoria, $salario)
    {
        // dd('Desde componente padre');
        // dd($salario);

        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }
    public function render()
    {
        // $vacantes = Vacante::all();
        $vacantes = Vacante::when($this->termino, function($query){
            $query->where('titulo', 'LIKE', "%" . $this->termino . "%");
        })
        ->when($this->categoria, function($query){
            $query->where('categoria_id',  $this->categoria );
        })
        ->when($this->salario, function($query){
            $query->where('salario_id', $this->salario);
        })
        ->get();

        //podemos usar get() o paginate()
        return view('livewire.home-vacantes',[
            'vacantes' => $vacantes
        ]);
    }
}
