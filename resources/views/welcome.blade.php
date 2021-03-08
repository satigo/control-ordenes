@extends('layouts/app', ['activePage' => 'welcome', 'title' => 'Sistema control de Ventas'])

@section('content')
    <div class="full-page section-image" data-color="black" data-image="{{asset('light-bootstrap/img/full-screen-image-2.jpg')}}">
        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-8">
                        <h1 class="text-white text-center">{{ __('Bienvenido a Sistema de Control de Ventas') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection