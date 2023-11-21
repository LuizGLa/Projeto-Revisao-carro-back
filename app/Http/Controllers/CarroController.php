<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    public function index()
    {
        try {
            $carro = Carro::all();

            return $carro;
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'marca' => 'required',
                'modelo' => 'required',
                'cor' => 'required',
                'ano' => 'required',
                'placa' => 'required',
                'cliente_id' => 'required',
            ]);
            $carro = Carro::create($request->all());

            return $carro;
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function show(Carro $carro)
    {
        try {
            $carro = Carro::find($carro);

            return $carro;
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function update(Request $request, Carro $carro)
    {
        try {
            $carro = Carro::find($carro->id);
            if ($carro) {
                $carro->update($request->all());

                return $carro;
            } else {
                return response()->json(['error' => 'Carro não encontrado'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function destroy(Carro $carro)
    {
        try {
            $carro = Carro::find($carro->id);
            if ($carro) {
                $carro->delete();

                return $carro;
            } else {
                return response()->json(['error' => 'Carro não encontrado'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }
}
