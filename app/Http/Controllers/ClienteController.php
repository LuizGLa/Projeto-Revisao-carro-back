<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $cliente = Cliente::all();

        return $cliente;
    }

    public function store(Request $request)
    {

        try {
            $request->validate([
                'nome' => 'required',
                'cpf' => 'required',
                'sexo' => 'required',
            ]);
            $cliente = Cliente::create($request->all());

            return $cliente;
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function show(Cliente $cliente)
    {
        try {
            $cliente = Cliente::find($cliente);

            return $cliente;

        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function update(Request $request, Cliente $cliente)
    {
        try {
            $cliente = Cliente::find($cliente->id);
            if ($cliente) {
                $cliente->update($request->all());

                return $cliente;
            } else {
                return response()->json(['error' => 'Cliente não encontrado'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function destroy(Cliente $cliente)
    {
        try {
            $cliente = Cliente::find($cliente->id);
            if ($cliente) {
                $cliente->delete();

                return $cliente;
            } else {
                return response()->json(['error' => 'Cliente não encontrado'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }
}
