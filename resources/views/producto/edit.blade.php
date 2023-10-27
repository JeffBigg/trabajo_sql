<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark-800 dark:text-dark-200 leading-tight">
            {{ __('Editar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-dark-100">

                    <form action="{{ route('productos.update', $producto) }}" method="POST">
                        @csrf @method('PATCH')


                        <div class="modal-body">
                            <form action="/registrar-producto" method="post">
                                <div class="mb-3">
                                    <label for="nombre-producto" class="form-label">Nombre del producto</label>
                                    <input type="text" class="form-control" id="nombre-producto"
                                        name="nombre_producto" value="{{ $producto->nombre_producto }}">
                                </div>
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input class="form-control" id="precio" name="precio"
                                        value="{{ $producto->precio }}">
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <input class="form-control" id="descripcion" name="descripcion"
                                        value="{{ $producto->descripcion }}">
                                </div>
                                <div class="mb-3">
                                    <label for="existencias" class="form-label">Existencias</label>
                                    <input type="number" class="form-control" id="existencias" name="existencias"
                                        value="{{ $producto->existencias }}">
                                </div>
                                <div class="mb-3">
                                    <label for="categoria" class="form-label">Categoría</label>
                                    <input type="text" class="form-control" id="categoria" name="categoria"
                                        value="{{ $producto->categoria }}">
                                </div>
                                <div class="mb-3">
                                    <label for="proveedor" class="form-label">Proveedor</label>
                                    <input type="text" class="form-control" id="proveedor" name="proveedor"
                                        value="{{ $producto->proveedor }}">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
