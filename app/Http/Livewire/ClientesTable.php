<?php

namespace App\Http\Livewire;

use App\Models\clientes;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class ClientesTable extends Component
{
    public $idEliminar;

    public function render()
    {
        $clients = clientes::all();
        foreach($clients as $cliente){
            $cliente->nombre_completo=Crypt::decrypt($cliente->nombre_completo);
            $cliente->direccion=Crypt::decrypt($cliente->direccion);
            $cliente->correo=Crypt::decrypt($cliente->correo);
        }
        return view('livewire.clientes-table', compact('clients'));
    }

    public function eliminarClientes($idC){
        $clientee = clientes::find($idC);
        $clientee->delete();
        return redirect()->route('clientes');
    }
}
