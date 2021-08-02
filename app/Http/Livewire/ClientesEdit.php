<?php

namespace App\Http\Livewire;

use App\Models\clientes;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class ClientesEdit extends Component
{

    public clientes $client;
    public $Titulo;
    protected $rules=[

        'client.nombre_completo' => 'required|min:6',
        'client.direccion' => 'required',
        'client.correo' => 'required|min:6',
        'client.telefono' => 'required|min:9',
    ];

    public function mount($id=null){

        if(is_null($id)){
            $this->Titulo ="Registrar Cliente";
            $this->client=new clientes();

        }else{
            $this->Titulo ="Editar Cliente";
            $this->client= clientes::find($id);
            $this->client->nombre_completo=Crypt::decrypt($this->client->nombre_completo);
            $this->client->direccion=Crypt::decrypt($this->client->direccion);
            $this->client->correo=Crypt::decrypt($this->client->correo);
        }
       
    }

    public function render()
    {

        return view('livewire.clientes-edit');
    }

    public function guardar(){
        //encry
        $this->client->nombre_completo=Crypt::encrypt($this->client->nombre_completo);
        $this->client->direccion=Crypt::encrypt($this->client->direccion);
        $this->client->correo=Crypt::encrypt($this->client->correo);

        $this->validate();

        $this->client->save();

        return redirect()->route('clientes');
    }
}