<header class="bg-gradient-to-b from-[#fff] to-[#fff]">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
        <div class="container">
            <!-- Logo / Marca -->
            <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('lista-materias') }}">
                <i class="bi bi-shield-lock-fill me-2 text-primary"></i>
                UMA <span class="text-primary ms-1">Admin</span>
            </a>

            <!-- Botón Móvil -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="adminNavbar">
                <!-- Enlaces Izquierdos -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/lista-profesores*') ? 'active' : '' }}" href="{{ route('lista-profesores') }}">
                            <i class="bi bi-people me-1"></i> Profesores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/lista-materias*') ? 'active' : '' }}" href="{{ route('lista-materias') }}">
                            <i class="bi bi-book me-1"></i> Materias
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/lista-alumnos*') ? 'active' : '' }}" href="{{ route('lista-alumnos') }}">
                            <i class="bi bi-person-badge me-1"></i> Alumnos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/lista-materias*') ? 'active' : '' }}" href="{{ route('lista-materias') }}">
                            <i class="bi bi-book me-1"></i> Preguntas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/asignar*') ? 'active' : '' }}" href="{{ route('asignar') }}">
                            <i class="bi bi-link-45deg me-1"></i> Asignaciones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('admin/asignar*') ? 'active' : '' }}" href="{{ route('asignar') }}">
                            <i class="bi bi-link-45deg me-1"></i> Resultados
                        </a>
                    </li>
                </ul>

                <!-- Info Usuario / Logout -->
                <div class="d-flex align-items-center">
                    <div class="text-light me-3 d-none d-lg-block">
                        {{-- <small class="text-muted d-block" style="font-size: 0.7rem;">ADMINISTRADOR</small> --}}
                        <span class="fw-bold">{{ auth()->user()->username }}</span>
                    </div>

                    <div class="dropdown">
                        <button class="btn btn-outline-light btn-sm dropdown-toggle rounded-circle" type="button" data-bs-toggle="dropdown" style="width: 40px; height: 40px;">
                            <i class="bi bi-person"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                            <li><a class="dropdown-item" href="/"><i class="bi bi-house me-2"></i> Ver Sitio</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

  </header>
