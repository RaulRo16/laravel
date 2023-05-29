<?php

namespace App\Http\Controllers;

use App\Models\productosModel;
use Illuminate\Http\Request;


class productosController extends Controller
{
    public function index()
    {
        $productos = productosModel::all();
        return response()->json($productos);
    }

    public function show($id)
    {
        $producto = productosModel::findOrFail($id);
        return response()->json($producto);
    }

    public function store(Request $request)
    {
        $producto = new productosModel();
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->save();
        return response()->json($producto, 201);
    }

    public function update(Request $request, $id)
    {
        $producto = productosModel::findOrFail($id);
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->save();
        return response()->json($producto);
    }

    public function destroy($id)
    {
        $producto = productosModel::findOrFail($id);
        $producto->delete();
        return response()->json(null, 204);
    }
}

