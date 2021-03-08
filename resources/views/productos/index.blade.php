@extends('layouts.app', ['activePage' => 'producto-management', 'activeButton' => 'laravel', 'title' => 'Lista de Productos', 'navName' => 'Productos'])

@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Productos') }}</h3>
                                    <p class="text-sm mb-0">
                                        {{ __('Se muestra el listado de productos registrados en el sistema.') }}
                                    </p>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('productos.create') }}" class="btn btn-sm btn-default">{{ __('Nuevo Producto') }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                            @include('alerts.success')
                            @include('alerts.errors')
                        </div>

                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Nombre') }}</th>
                                    <th>{{ __('Descripcion') }}</th>
                                    <th>{{ __('Cantidad') }}</th>
                                    <th>{{ __('Precio') }}</th>
                                    <th>{{ __('Vendedor') }}</th>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Nombre') }}</th>
                                    <th>{{ __('Descripcion') }}</th>
                                    <th>{{ __('Cantidad') }}</th>
                                    <th>{{ __('Precio') }}</th>
                                    <th>{{ __('Vendedor') }}</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ $producto->id }}</td>
                                            <td>{{ $producto->name }}</td>
                                            <td>{{ $producto->description }}</td>
                                            <td>{{ $producto->cantidad }}</td>
                                            <td>{{ $producto->precio }}</td>
                                            <td>{{ $producto->user->name}}</td>
                                            <td class="d-flex justify-content-end">
                                                @if ($producto->id_user != auth()->id() && $producto->cantidad>0) 
                                                <a href="{{ route('productos.venta', $producto->id) }}" class="btn btn-link btn-warning edit d-inline-block"><i class="fa fa-edit"></i>Comprar</a>                                                
                                                
                                                   <!--  <a href="{{ route('ventas.create', $producto->id) }}" class="btn btn-link btn-warning edit d-inline-block"><i class="fa fa-edit"></i>Comprar</a> -->
                                                @endif
                                                @if ($producto->id_user == auth()->id())     
                                                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-link btn-warning edit d-inline-block"><i class="fa fa-edit"></i>Editar</a>
                                                @endif
                                                    <form class="d-inline-block" action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <a class="btn btn-link btn-danger " onclick="confirm('{{ __('Realmente deseas eliminar el producto?') }}') ? this.parentElement.submit() : ''"s><i class="fa fa-times"></i></a>
                                                    </form>
                                                    
                                                                                                    
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Buscar registros",
                }

            });


            var table = $('#datatables').DataTable();

            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                table.row($tr).remove().draw();
                e.preventDefault();
            });
        });
    </script>
@endpush