<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Botón menú -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>

        <!-- Nombre del sistema -->
        <li class="nav-item d-none d-sm-inline-block">
            <span class="nav-link font-weight-bold">
                📦 Sistema de Pedidos
            </span>
        </li>
    </ul>

    <!-- Lado derecho -->
    <ul class="navbar-nav ml-auto">

        <!-- Usuario -->
        <li class="nav-item d-flex align-items-center mr-3">

            @php
                $userPhotoPath = 'uploads/users/' . Auth::user()->photo;
            @endphp

            <img 
                src="{{ (!empty(Auth::user()->photo) && file_exists(public_path($userPhotoPath))) 
                    ? asset($userPhotoPath) 
                    : asset('backend/dist/img/user2-160x160.jpg') }}" 
                class="img-circle elevation-2 mr-2"
                style="width:35px; height:35px;"
            >

            <span class="text-secondary">
                {{ Auth::user()->name }}
            </span>
        </li>

        <!-- Logout -->
        <li class="nav-item">
            <a class="nav-link text-danger" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               title="Cerrar Sesión">

                <i class="fas fa-sign-out-alt"></i>
            </a>

            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display:none">
                @csrf
            </form>
        </li>

    </ul>
</nav>