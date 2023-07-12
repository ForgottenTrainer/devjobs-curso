<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Vacante;
use App\Notifications\NuevoCandidato;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante;
    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }
    
    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function postularme()
    {
        $this->validate();

        //Almacenar cv en el disco duro
        $cv = $this->cv->store('public/cv');
        $datos['cv'] = str_replace('public/cv', '', $cv);
        //Crear la vacante

        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);

        //Crear mensaje al correo

        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        //Mostrar el usuario de un okey
        session()->flash('mensaje','Se envio correctamente');
        return redirect()->back();
    }
    
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
