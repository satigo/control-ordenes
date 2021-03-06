@extends('layouts.app', ['activePage' => 'productos-management', 'activeButton' => 'laravel', 'title' => 'Editar Producto', 'navName' => 'Editar Producto'])

@section('content')
    <div class="content">
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12 order-xl-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Editar Producto') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('productos.index') }}" class="btn btn-sm btn-default">{{ __('Volver al Listado') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('productos.update',$producto) }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                @include('alerts.success')
                                @include('alerts.errors')
                                <h6 class="heading-small text-muted mb-4">{{ __('Informacion de Producto') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Nombre') }}
                                        </label>
                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" value="{{ old('name',$producto->name) }}" required autofocus autocomplete>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-description">{{ __('Descripcion') }}</label>
                                        <input type="text" name="description" id="input-description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Descripcion') }}" value="{{ old('description', $producto->description) }}" required autocomplete>

                                        @include('alerts.feedback', ['field' => 'description'])
                                    </div>
                                    <div class="form-group{{ $errors->has('precio') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-precio">{{ __('Precio') }}</label>
                                        <input type="number" name="precio" id="input-precio" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" placeholder="{{ __('Precio') }}" value="{{ old('precio', $producto->precio) }}" required autocomplete>

                                        @include('alerts.feedback', ['field' => 'precio'])
                                    </div>

                                    <div class="form-group{{ $errors->has('cantidad') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-cantidad">{{ __('Cantidad') }}</label>
                                        <input type="number" name="cantidad" id="input-cantidad" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Cantidad') }}" value="{{old('cantidad',$producto->cantidad)}}" required autocomplete>

                                        @include('alerts.feedback', ['field' => 'cantidad'])
                                    </div>
                                    

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Guardar Cambios') }}</button>
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