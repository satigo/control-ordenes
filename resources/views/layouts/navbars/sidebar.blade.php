<div class="sidebar" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                {{ __("MENU OPCIONES") }}
            </a>
        </div>
        <ul class="nav">
            
           
            <li class="nav-item">
                
                <div class="collapse @if($activeButton =='laravel') show @endif" id="laravelExamples">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'user') active @endif">
                            <a class="nav-link" href="{{route('profile.edit')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("Perfil Vendedor") }}</p>
                            </a>
                        </li>
                       
                        <li class="nav-item @if($activePage == 'producto-management') active @endif">
                            <a class="nav-link" href="{{route('productos.index')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("Administrar Productos") }}</p>
                            </a>
                        </li>
                        @if(auth()->id()!='1')
                        <li class="nav-item @if($activePage == 'venta-management') active @endif">
                            <a class="nav-link" href="{{route('ventas.index')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("Ver Ventas") }}</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>       
            
           
        </ul>
    </div>
</div>
