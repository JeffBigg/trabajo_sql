<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrar-producto">
                        Registrar producto
                    </button>


                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                <th>Stock</th>
                                <th>Categoría</th>
                                <th>Proveedor</th>
                                <th>Acciones</th>
                            </tr>   
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                            <tr>    
                                <td>{{ $producto->nombre_producto }}</td>
                                <td>S/.{{ $producto->precio }}</td>
                                <td>{{ $producto->descripcion }}</td>
                                <td>{{ $producto->existencias }}</td>
                                <td>{{ $producto->categoria }}</td>
                                <td>{{ $producto->proveedor }}</td>
                                <td>
                                    <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editar-producto">
                                        editar
                                    </a>

                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <form action="{{ route('producto.store') }}" method="POST">
                        @csrf
                        <div class="modal fade" id="registrar-producto" tabindex="-1" aria-labelledby="registrar-producto-label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="registrar-producto-label">Registrar producto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/registrar-producto" method="post">
                                            <div class="mb-3">
                                                <label for="nombre-producto" class="form-label">Nombre del producto</label>
                                                <input type="text" class="form-control" id="nombre-producto" name="nombre_producto">
                                            </div>
                                            <div class="mb-3">
                                                <label for="precio" class="form-label">Precio</label>
                                                <input class="form-control" id="precio" name="precio">
                                            </div>
                                            <div class="mb-3">
                                                <label for="descripcion" class="form-label">Descripción</label>
                                                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="existencias" class="form-label">Existencias</label>
                                                <input type="number" class="form-control" id="existencias" name="existencias">
                                            </div>
                                            <div class="mb-3">
                                                <label for="categoria" class="form-label">Categoría</label>
                                                <input type="text" class="form-control" id="categoria" name="categoria">
                                            </div>
                                            <div class="mb-3">
                                                <label for="proveedor" class="form-label">Proveedor</label>
                                                <input type="text" class="form-control" id="proveedor" name="proveedor">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>






                </div>
            </div>
        </div>
    </div>
</x-app-layout>