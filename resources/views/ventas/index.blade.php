@extends('layouts.app', ['activePage' => 'venta-management', 'activeButton' => 'laravel', 'title' => 'Lista de Ventas', 'navName' => 'Ventas'])

@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Ventas') }}</h3>
                                    <p class="text-sm mb-0">
                                        {{ __('Se muestra el listado de ventas registradas en el sistema.') }}
                                    </p>
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
                                    <th>{{ __('Total') }}</th>
                                    <th>{{ __('COD_Vendedor') }}</th>
                                    <th>{{ __('Fecha Venta') }}</th>
                                    
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Total') }}</th>
                                    <th>{{ __('COD_Vendedor') }}</th>
                                    <th>{{ __('Fecha Venta') }}</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                
                                    @foreach ($ventas as $venta)
                                        <tr>
                                            <td>{{ $venta->id }}</td>
                                            <td>{{ $venta->total }}</td>
                                            <td>{{ $venta->user->name }}</td>
                                            <td>{{ $venta->created_at }}</td>                                            
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