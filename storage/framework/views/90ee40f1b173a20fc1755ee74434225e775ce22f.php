<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>PANEL &mdash; SISDATAPERU</title>
    <link rel="shortcut icon" href="<?php echo e(asset('assets/img/school.svg')); ?>" type="image/x-icon">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/fontawesome/css/all.min.css')); ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/modules/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2-bootstrap4.css')); ?>" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="<?php echo e(asset('assets/modules/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/sweetalert.min.js')); ?>"></script>

    <?php echo \Livewire\Livewire::styles(); ?>


</head>

<body style="background: #e2e8f0">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?php echo e(asset('assets/img/avatar/avatar-1.png')); ?>"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hola, <?php echo e(auth()->user()->name); ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?php echo e(route('logout')); ?>" style="cursor: pointer" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Salir
                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="#">SISDATAPERÚ</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">HLD</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">MENU PRINCIPAL</li>
                        <li class="<?php echo e(setActive('/dashboard')); ?>">
                            <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tickets.index')): ?>
                        <li class="<?php echo e(setActive('/tickets')); ?>">
                            <a class="nav-link" href="<?php echo e(route('tickets.index')); ?>">
                                <i class="fas fa-ticket-alt"></i>
                                <span>Ticket</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('news.index')): ?>
                        <li class="<?php echo e(setActive('/news')); ?>">
                            <a class="nav-link" href="<?php echo e(route('news.index')); ?>">
                                <i class="fas fa-newspaper"></i>
                                <span>Noticias</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('projects.index')): ?>
                        <li class="<?php echo e(setActive('/projects')); ?>">
                            <a class="nav-link" href="<?php echo e(route('projects.index')); ?>">
                                <i class="fas fa-project-diagram"></i>
                                <span>Projectos</span>
                            </a>
                        </li> 
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('customers.index')): ?>
                        <li class="<?php echo e(setActive('/customers')); ?>">
                            <a class="nav-link" href="<?php echo e(route('customers.index')); ?>">
                                <i class="fas fa-user-tie"></i>
                                <span>Areas</span>
                            </a>
                        </li> 
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slas.index')): ?>
                        <li class="<?php echo e(setActive('/slas')); ?>">
                            <a class="nav-link" href="<?php echo e(route('slas.index')); ?>">
                                <i class="fas fa-file-medical-alt"></i>
                                <span>SLA</span>
                            </a>
                        </li> 
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permissions.index')): ?>
                        <li class="menu-header">OPCIONES</li>
                        <li class="<?php echo e(setActive('/permissions')); ?>">
                            <a class="nav-link" href="<?php echo e(route('permissions.index')); ?>">
                                <i class="fas fa-unlock-alt"></i>
                                <span>Permisos</span> 
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.index')): ?>
                        <li class="<?php echo e(setActive('/roles')); ?>">
                            <a class="nav-link" href="<?php echo e(route('roles.index')); ?>">
                                <i class="fas fa-unlock"> </i> 
                                <span>Roles</span> 
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.index')): ?>
                        <li class="<?php echo e(setActive('/user')); ?>">
                            <a class="nav-link" href="<?php echo e(route('users.index')); ?>">
                                <i class="fas fa-users"></i> 
                                <span>Usuarios</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('log_users.index')): ?>
                        <li class="<?php echo e(setActive('/user-log')); ?>">
                            <a class="nav-link" href="<?php echo e(route('userlog.index')); ?>">
                                <i class="fas fa-list"></i> 
                                <span>Seguimiento de Usuarios</span>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <?php echo $__env->yieldContent('content'); ?>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2023 <div class="bullet"></div> SISDATAPERU <div class="bullet"></div> Derechos reservados.
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo e(asset('assets/modules/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/stisla.js')); ?>"></script>
    

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
    <script>
        //active select2
        // $(document).ready(function () {
        //     $('select').select2({
        //         theme: 'bootstrap4',
        //         width: 'style',
        //     });
        // });

        //flash message
        <?php if(session()-> has('success')): ?>
        swal({
            type: "success",
            icon: "success",
            title: "EXITOSO!",
            text: "SE GUARDO EXITOSAMENTE",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        <?php elseif(session()-> has('error')): ?>
        swal({
            type: "error",
            icon: "error",
            title: "FALLO!",
            text: "HUBO UN FALLO",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        <?php endif; ?>
    </script>

    <?php echo \Livewire\Livewire::scripts(); ?>

</body>
</html><?php /**PATH C:\laragon\www\sisdataperu\resources\views/layouts/app.blade.php ENDPATH**/ ?>