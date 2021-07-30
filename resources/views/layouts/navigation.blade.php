<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admins">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-ambulance"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hospital Nuestra Familia</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-3">

    <!-- Elementos del panels de navegación del Dashboard -->
    <li class="nav-item active">
        <div class="container text-white">
            <i class="far fa-id-card"></i>

            @if (Auth::user()->rol_id == 1)
                <span>Panel del administrador</span>
            @elseif (Auth::user()->rol_id==2)
                <span>Panel del cliente</span>
            @else
                <span>Panel del medico</span>
            @endif
        </div>

        @auth
            <div class="container text-center text-white">{{ Auth::user()->name }}</div>
        @endauth
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Opciones
    </div>

    {{-- ------------------------------------------ Administrador --}}

    <!-- Nav Item - Ingreso de paciente -->
    @can('admin.paciente')
        <li class="nav-item">
            <a class="nav-link" href="/adminpaciente">
                <i class="fas fa-bed"></i>
                <span>Administración de Paciente</span>
            </a>
        </li>
    @endcan

    <!-- Nav Item - Ingreso de Cliente -->
    @can('admin.clientes')
        <li class="nav-item">
            <a class="nav-link" href="/adminclientes">
                <i class="fas fa-bed"></i>
                <span>Administración de Cliente</span>
            </a>
        </li>
    @endcan

    <!-- Nav Item - Agenda tu cita -->
    @can('admin.citas')
        <li class="nav-item">
            <a class="nav-link" href="/admincitas">
                <i class="fas fa-calendar-alt"></i>
                <span>Administrar Citas</span>
            </a>
        </li>
    @endcan


    <!-- Nav Item - Administrar Médicos -->
    @can('admin.medicos')
        <li class="nav-item">
            <a class="nav-link" href="/adminmedicos">
                <i class="fas fa-address-book"></i>
                <span>Administrar Médicos</span>
            </a>
        </li>
    @endcan


    <!-- Nav Item - Administrar Especialidades -->
    @can('admin.especialidades.index')
        <li class="nav-item">
            <a class="nav-link" href="/adminespecialidades">
                <i class="far fa-hospital"></i>
                <span>Administrar Especialidades</span>
            </a>
        </li>
    @endcan

    {{-- ------------------------------------------- Clientes --}}

    @can('cliente.historial')
        <li class="nav-item">
            <a class="nav-link" href="/historial">
                <i class="fas fas fa-address-card"></i>
                <span>Historial del paciente</span></a>
        </li>
    @endcan

    @can('cliente.pacientescliente')
        <li class="nav-item">
            <a class="nav-link" href="/pacientecliente">
                <i class="fas fas fa-address-card"></i>
                <span>Citas de Pacientes</span></a>
        </li>
    @endcan


    <!-- Nav Item - Agenda tu cita -->
    @can('cliente.citas')
        <li class="nav-item">
            <a class="nav-link" href="/citas">
                <i class="fas fa-calendar-alt"></i>
                <span>Pacientes</span>
            </a>
        </li>
    @endcan


    <!-- Nav Item - Recetas y Exámenes -->
    {{-- @can('cliente.pedidosmed')
        <li class="nav-item">
            <a class="nav-link" href="pedidosmed">
                <i class="fas fa-clipboard"></i>
                <span>Recetas y Exámenes</span>
            </a>
        </li>
    @endcan --}}

    {{-- ------------------------------------------- Medico --}}

    <!-- Nav Item - Principal Medico -->
    @can('medico.home')
        <li class="nav-item">
            <a class="nav-link" href="/medicos">
                <i class="fas fa-clipboard"></i>
                <span>Tu Agenda</span>
            </a>
        </li>
    @endcan

    <!-- Nav Item - Para ver informacion de los pacientes -->
    @can('medico.infopaciente')
        <li class="nav-item">
            <a class="nav-link" href="/paciente">
                <i class="fas fa-clipboard"></i>
                <span>Pacientes</span>
            </a>
        </li>
    @endcan

    <!-- Nav Item - Para crear una cita de control -->
    @can('medico.control')
        <li class="nav-item">
            <a class="nav-link" href="/control">
                <i class="fas fa-clipboard"></i>
                <span>Historial</span>
            </a>
        </li>
    @endcan

    {{-- <!-- Nav Item - Para escribir un diagnóstico -->
    @can('medico.diagnostico')
        <li class="nav-item">
            <a class="nav-link" href="diagnosticar">
                <i class="fas fa-clipboard"></i>
                <span>Diagnosticar</span>
            </a>
        </li>
    @endcan --Se lo puede manejar dentro de un mismo apartado al control y al diagnóstico --}}

    <!--------------------------------------- Nav Item - Logout -->

    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i>
            <span>Salir</span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
