<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Productos;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $producto = Productos::get();
        return view('dashboard', ['productos' => $producto]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required|min:3|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'required',
            'existencias' => 'required|numeric',
            'categoria' => 'required',
            'proveedor' => 'required',
        ]);

        $producto = new Productos();
        $producto->nombre_producto = $request->nombre_producto;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;
        $producto->existencias = $request->existencias;
        $producto->categoria = $request->categoria;
        $producto->proveedor = $request->proveedor;

        $producto->save();

        return redirect()->route('dashboard');
    }
    public function edit($id)
    {
        $producto = Productos::findOrFail($id);
        return view('producto.edit', compact('producto'));
    }
    public function update(Request $request, $id)
    {
        $producto = Productos::findOrFail($id);

        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');
        $producto->existencias = $request->input('existencias');
        $producto->categoria = $request->input('categoria');
        $producto->proveedor = $request->input('proveedor');

        $producto->save();

        return redirect()->route('dashboard')->with('success', 'Producto actualizado con éxito');
    }
    public function destroy($id)
    {
        $producto = Productos::findOrFail($id);
        $producto->delete();
        return to_route('dashboard')->with('status', 'post eliminado');
    }

    public function ventas()
    {
        return view('producto.ventas');
    }
}
