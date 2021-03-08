@extends('layouts.app', ['activePage' => 'producto-management', 'activeButton' => 'laravel', 'title' => 'Confirmar Compra', 'navName' => 'Compra'])

@section('content')
    <div class="content">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('COMPRA') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('productos.index') }}" class="btn btn-sm btn-default">{{ __('Volver al Listado') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <form method="post" action="{{ route('ventas.store') }}" enctype="multipart/form-data">                                
                                @csrf                               

                                @include('alerts.success')
                                @include('alerts.errors')
                                <h6 class="heading-small text-muted mb-4">{{ __('Informacion de Producto') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Nombre: ') }} 
                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$producto->name}}" readonly>
                                        </label>        
                                    </div>   
                                    <input type="number" name="id" id="input-id" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" value="{{$producto->id}}" hidden>
                                    <div>
                                    </div>                                 
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Precio: ') }}
                                            <input type="number" name="precio" id="input-precio" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" value="{{$producto->precio}}" readonly>
                                        </label>        
                                    </div>  

                                    <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cantidad">{{ __('Cantidad') }}</label>
                                        <input type="number" name="cantidad" id="input-cantidad" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" value="1" min="1" max="{{$producto->cantidad}}" required autocomplete> 

                                        @include('alerts.feedback', ['field' => 'cantidad'])
                                    </div>
                                    

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Confirmar Compra') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection