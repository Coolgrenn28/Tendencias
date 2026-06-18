<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/home') }}" class="brand-link text-center">
        <img src="{{ asset('backend/dist/img/logo1.png')}}" 
             alt="Logo"  
             style="opacity: .8; width:180px; height:100px;">
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ url('/home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Gestión -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Gestión <i class="right fas fa-angle-left"></i></p>
                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{ route('clientes.index') }}" class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Clientes</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('productos.index') }}" class="nav-link">
                                <i class="fas fa-box nav-icon"></i>
                                <p>Productos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('pedidos.index') }}" class="nav-link">
                                <i class="fas fa-shopping-cart nav-icon"></i>
                                <p>Pedidos</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('transportistas.index') }}" class="nav-link">
                                <i class="fas fa-truck nav-icon"></i>
                                <p>Transportistas</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('estados.index') }}" class="nav-link">
                                <i class="fas fa-exchange-alt nav-icon"></i>
                                <p>Estados Pedido</p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>