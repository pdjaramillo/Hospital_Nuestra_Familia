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

            <?php if(Auth::user()->rol_id == 1): ?>
                <span>Panel del administrador</span>
            <?php elseif(Auth::user()->rol_id==2): ?>
                <span>Panel del cliente</span>
            <?php else: ?>
                <span>Panel del medico</span>
            <?php endif; ?>
        </div>

        <?php if(auth()->guard()->check()): ?>
            <div class="container text-center text-white"><?php echo e(Auth::user()->name); ?></div>
        <?php endif; ?>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Opciones
    </div>

    

    <!-- Nav Item - Ingreso de paciente -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.paciente')): ?>
        <li class="nav-item">
            <a class="nav-link" href="/adminpaciente">
                <i class="fas fa-bed"></i>
                <span>Administración de Paciente</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Nav Item - Ingreso de Cliente -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.clientes')): ?>
        <li class="nav-item">
            <a class="nav-link" href="/adminclientes">
                <i class="fas fa-bed"></i>
                <span>Administración de Cliente</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Nav Item - Agenda tu cita -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.citas')): ?>
        <li class="nav-item">
            <a class="nav-link" href="/admincitas">
                <i class="fas fa-calendar-alt"></i>
                <span>Administrar Citas</span>
            </a>
        </li>
    <?php endif; ?>


    <!-- Nav Item - Administrar Médicos -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.medicos')): ?>
        <li class="nav-item">
            <a class="nav-link" href="/adminmedicos">
                <i class="fas fa-address-book"></i>
                <span>Administrar Médicos</span>
            </a>
        </li>
    <?php endif; ?>


    <!-- Nav Item - Administrar Especialidades -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.especialidades.index')): ?>
        <li class="nav-item">
            <a class="nav-link" href="/adminespecialidades">
                <i class="far fa-hospital"></i>
                <span>Administrar Especialidades</span>
            </a>
        </li>
    <?php endif; ?>

    

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cliente.historial')): ?>
        <li class="nav-item">
            <a class="nav-link" href="/historial">
                <i class="fas fas fa-address-card"></i>
                <span>Historial del paciente</span></a>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cliente.pacientescliente')): ?>
        <li class="nav-item">
            <a class="nav-link" href="/pacientecliente">
                <i class="fas fas fa-address-card"></i>
                <span>Citas de Pacientes</span></a>
        </li>
    <?php endif; ?>


    <!-- Nav Item - Agenda tu cita -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('cliente.citas')): ?>
        <li class="nav-item">
            <a class="nav-link" href="/citas">
                <i class="fas fa-calendar-alt"></i>
                <span>Pacientes</span>
            </a>
        </li>
    <?php endif; ?>


    <!-- Nav Item - Recetas y Exámenes -->
    

    

    <!-- Nav Item - Principal Medico -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('medico.home')): ?>
        <li class="nav-item">
            <a class="nav-link" href="/medicos">
                <i class="fas fa-clipboard"></i>
                <span>Tu Agenda</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Nav Item - Para ver informacion de los pacientes -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('medico.infopaciente')): ?>
        <li class="nav-item">
            <a class="nav-link" href="/paciente">
                <i class="fas fa-clipboard"></i>
                <span>Pacientes</span>
            </a>
        </li>
    <?php endif; ?>

    <!-- Nav Item - Para crear una cita de control -->
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('medico.control')): ?>
        <li class="nav-item">
            <a class="nav-link" href="/control">
                <i class="fas fa-clipboard"></i>
                <span>Historial</span>
            </a>
        </li>
    <?php endif; ?>

    

    <!--------------------------------------- Nav Item - Logout -->

    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i>
            <span>Salir</span></a>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
            <?php echo csrf_field(); ?>
        </form>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<?php /**PATH C:\laragon\www\Hospital_NF2\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>