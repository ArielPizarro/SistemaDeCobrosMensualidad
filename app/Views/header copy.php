<?php

$user_session = session();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pameliwis</title>



    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link href="<?php echo base_url(); ?>/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/jquery-ui/external/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>/js/jquery-ui/jquery-ui.min.js"></script>
  


    
    
<!-- Navbar Brand
 


 
 

<link href="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js" rel="stylesheet" />



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>











-->


</head>


<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?php echo base_url(); ?>/inicio">Pameliwis</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto  me-3 me-lg-4 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $user_session->nombre; ?><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/usuarios/cambia_password">Cambiar Contrase??a</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/usuarios/logout">Cerrar sesi??n</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <div class="sb-sidenav-menu-heading">Opciones</div>
                        <a class="nav-link" href="<?php echo base_url(); ?>/alumnos ">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>Alumnos
                        </a>
                        <a class="nav-link" href="<?php echo base_url(); ?>/alumnos/indexAbono ">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>Abonar
                        </a>
                        <a class="nav-link" href="<?php echo base_url(); ?>/pagos ">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>Historial de pagos
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-basket"></i></div>
                            Productos
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url(); ?>/productos ">Productos</a>
                                <a class="nav-link" href="<?php echo base_url(); ?>/unidades ">Unidades</a>
                                <a class="nav-link" href="<?php echo base_url(); ?>/categorias ">Categor??as</a>
                            </nav>
                        </div>

                        <a class="nav-link" href="<?php echo base_url(); ?>/clientes ">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>Clientes
                        </a>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#menuCompras" aria-expanded="false" aria-controls="menuCompras">
                            <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                            Compras
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuCompras" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url(); ?>/compras/nuevo ">Nueva compra</a>
                                <a class="nav-link" href="<?php echo base_url(); ?>/compras ">Compras</a>

                            </nav>
                        </div>

                        <a class="nav-link" href="<?php echo base_url(); ?>/ventas/venta ">
                            <div class="sb-nav-link-icon"><i class="fas fa-cash-register"></i></div>Caja
                        </a>

                        <a class="nav-link" href="<?php echo base_url(); ?>/ventas">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>Ventas
                        </a>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#menuReportes" aria-expanded="false" aria-controls="menuReportes">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            Reportes
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="menuReportes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url(); ?>/productos/mostrarMinimos">Reporte M??nimos</a>


                            </nav>
                        </div>


                                <div class="sb-sidenav-menu-heading">Opciones</div>
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#subAdministracion" aria-expanded="false" aria-controls="subAdministracion">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                                            Administraci??n
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="subAdministracion" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="<?php echo base_url(); ?>/configuracion ">Configuraci??n</a>
                                                <a class="nav-link" href="<?php echo base_url(); ?>/usuarios ">Usuarios</a>
                                                <a class="nav-link" href="<?php echo base_url(); ?>/roles ">Roles</a>
                                            </nav>
                                        </div>
 


                                        <div class="sb-sidenav-menu-heading">Opciones Alumnos</div>
                                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#subAlumno" aria-expanded="false" aria-controls="subAlumno">
                                            <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                                            Configuraci??n
                                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                        </a>
                                        <div class="collapse" id="subAlumno" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                            <nav class="sb-sidenav-menu-nested nav">
                                                <a class="nav-link" href="<?php echo base_url(); ?>/alumnos ">Lista Alumnos</a>
                                                <a class="nav-link" href="<?php echo base_url(); ?>/cursos ">cursos</a>
                                                <a class="nav-link" href="<?php echo base_url(); ?>/roles ">Roles</a>
                                            </nav>
                                        </div>



                    </div>





                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>