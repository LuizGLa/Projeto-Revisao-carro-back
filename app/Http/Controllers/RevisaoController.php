<?php

namespace App\Http\Controllers;

use App\Models\Revisao;
use Illuminate\Http\Request;

class RevisaoController extends Controller
{
    public function index()
    {
        try {
            $revisoes = Revisao::with('cliente', 'carro')->get();

            return $revisoes;
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'data' => 'required',
                'valor' => 'required',
                'descricao' => 'required',
                'carro_id' => 'required',
                'cliente_id' => 'required',
            ]);
            $revisao = Revisao::create($request->all());

            return $revisao;
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $revisao = Revisao::with('cliente', 'carro')->findOrFail($id);

            return $revisao;
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function update(Request $request, Revisao $revisao)
    {
        try {
            $revisao = Revisao::find($revisao->id);
            if ($revisao) {
                $revisao->update($request->all());

                return $revisao;
            } else {
                return response()->json(['error' => 'Revisão não encontrada'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function destroy(Revisao $revisao)
    {
        try {
            $revisao = Revisao::find($revisao->id);
            if ($revisao) {
                $revisao->delete();

                return response()->json(['success' => 'Revisão deletada com sucesso'], 200);
            } else {
                return response()->json(['error' => 'Revisão não encontrada'], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }
}
