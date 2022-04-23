<?php
session_start();
require 'conexion.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$id = $_SESSION['id'];
$tipo_usuario = $_SESSION['tipo_usuario'];

if ($tipo_usuario == 1) {
    $where = "";
} else if ($tipo_usuario == 2) {
    $where = "WHERE id=$id";
}

$sql = "SELECT * FROM tb_usuarios $where";
$resultado = $mysqli->query($sql);

$sql = "SELECT * FROM tb_cliente $where";
$resultado1 = $mysqli->query($sql);

$sql = "SELECT * FROM tb_proveedor $where";
$resultado2 = $mysqli->query($sql);

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$nombre = $_SESSION['nombre'];
$tipo_usuario = $_SESSION['tipo_usuario'];



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Distribuciones J&SANTI</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/logo.png">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    <!-- DataTables -->
    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>


<body class="fixed-left">

    <!-- Loader -->


    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>

            <div class="left-side-logo d-block d-lg-none">
                <div class="text-center">

                    <a href="principal.php" class="logo"><img src="assets/images/logo.png" height="100" alt="logo"></a>
                </div>
            </div>

            <div class="sidebar-inner slimscrollleft">

                <div id="sidebar-menu">
                    <ul>
                        <li class="menu-title">Menu</li>

                        <li>
                            <a href="principal.php" class="waves-effect">
                                <i class="dripicons-meter"></i>
                                <span> Inicio <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li>

                        <li>

                            <a href="cliente1.php" class="waves-effect">
                                <i class="mdi mdi-account-network"></i>
                                <span> Clientes <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>

                        </li>

                        <li>

                            <a href="proveedores.php" class="waves-effect">
                                <i class="mdi mdi-account-multiple"></i>
                                <span> Proveedores <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>

                        </li>

                        <li>

                            <a href="productos.php" class="waves-effect">
                                <i class="mdi mdi-shopping"></i>
                                <span> Productos <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>

                        </li>

                        <li>
                            <a href="categoria.php" class="waves-effect">
                                <i class="dripicons-graph-pie"></i>
                                <span> Categorias<span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li>

                        
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cart"></i><span>
                                    Ventas </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                             <li><a href="ventas.php">Nueva venta</a></li>
                                <li><a href="misventas.php">Mis ventas</a></li>
                            </ul>
                        </li>
                        <li class="menu-title">Extra</li>
                        <li>

                            <a href="contacto.php" class="waves-effect">
                                <i class="mdi mdi-contact-mail"></i>
                                <span> Contactos<span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span>
                            </a>
                        </li>

                        <!-- <li class="menu-title">Extra</li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-location"></i><span>
                                    Maps </span> <span class="badge badge-danger badge-pill float-right">2</span></a>
                            <ul class="list-unstyled">
                                <li><a href="maps-google.html"> Google Map</a></li>
                                <li><a href="maps-vector.html"> Vector Map</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-brightness-max"></i>
                                <span> Icons </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="icons-material.html">Material Design</a></li>
                                <li><a href="icons-ion.html">Ion Icons</a></li>
                                <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                                <li><a href="icons-themify.html">Themify Icons</a></li>
                                <li><a href="icons-dripicons.html">Dripicons</a></li>
                                <li><a href="icons-typicons.html">Typicons Icons</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="calendar.html" class="waves-effect"><i class="dripicons-calendar"></i><span>
                                    Calendar </span></a>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-copy"></i><span>
                                    Pages </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="pages-blank.html">Blank Page</a></li>
                                <li><a href="pages-login.html">Login</a></li>
                                <li><a href="pages-register.html">Register</a></li>
                                <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                <li><a href="pages-404.html">Error 404</a></li>
                                <li><a href="pages-500.html">Error 500</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-jewel"></i><span>
                                    Extras </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li><a href="extras-pricing.html">Pricing</a></li>
                                <li><a href="extras-invoice.html">Invoice</a></li>
                                <li><a href="extras-timeline.html">Timeline</a></li>
                                <li><a href="extras-faqs.html">FAQs</a></li>
                                <li><a href="extras-maintenance.html">Maintenance</a></li>
                                <li><a href="extras-comingsoon.html">Coming Soon</a></li>
                            </ul>
                        </li>

                    </ul>-->
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <div class="topbar-left	d-none d-lg-block">
                        <div class="text-center">

                            <a href="principal.php" class="logo"><img src="assets/images/logo.png" height="80" alt="logo"></a>
                        </div>
                    </div>

                    <nav class="navbar-custom">

                        <ul class="list-inline float-right mb-0">
                            <li class="list-inline-item notification-list dropdown d-none d-sm-inline-block">

                            </li>




                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/users/astronaut.png" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> <?php echo $nombre; ?> </a>

                                    <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout m-r-5 text-muted"></i>
                                        Salir</a>
                                </div>
                            </li>

                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="list-inline-item">
                                <button type="button" class="button-menu-mobile open-left waves-effect">
                                    <i class="ion-navicon"></i>
                                </button>
                            </li>
                        </ul>

                        <div class="clearfix"></div>

                    </nav>

                </div>
                <!-- Top Bar End -->

                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="float-right page-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Distribuciones J & Santi</a></li>
                                        <li class="breadcrumb-item active">Contacto</li>
                                    </ol>
                                </div>
                                <h5 class="page-title">Lista de contacto</h5>
                            </div>
                        </div>
                        <!-- end row -->

                  

                        <div class="row">
                            <div class="col-xl-7 col-md-6">
                                <div class="card mini-stat m-b-30">
                                    <div class="p-3 bg-primary text-white">
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-arrow-down-bold-circle float-right mb-0"></i>
                                        </div>
                                        <h6 class="text-uppercase mb-0 font-weight-bold">CONTACTO DE CLIENTES</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="border-bottom pb-4">
                                            <div class="mt-4 text-muted">

                                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr class="text-center">

                                                    <th>C.C</th>
                                                    <th>NOMBRE</th>
                                                    <th>APELLIDO</th>
                                                    <th>CORREO</th>
                                                    <th>CELULAR</th>
                                                    <th>DIRECCION</th>
                                                    <th>BARRIO</th>
                                                    <th>NEGOCIO</th>
                                                    <th>EXTRAS</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php while ($row = $resultado1->fetch_assoc()) { ?>

                                                    <tr class="text-center">

                                                        <td><?php echo $row['cc_clie']; ?></td>
                                                        <td><?php echo $row['nombre_clie']; ?></td>
                                                        <td><?php echo $row['apellido_clie']; ?></td>
                                                        <td><?php echo $row['correo_clie']; ?></td>
                                                        <td><?php echo $row['celular_clie']; ?></td>
                                                        <td><?php echo $row['direccion_clie']; ?></td>
                                                        <td><?php echo $row['barrio_clie']; ?></td>
                                                        <td><?php echo $row['nombre_negocio_clie']; ?></td>
                                                        <td>
                                                            <a class="btn btn-success waves-effect waves-light mdi mdi-whatsapp" href="https://api.whatsapp.com/send?phone=+57<?php echo $row['celular_clie']; ?>&text="></a>
                                                            <a class="btn btn-danger waves-effect waves-light mdi mdi-gmail" href="mailto:<?php echo $row['correo_clie']; ?>"></a>
                                                            <a class="btn btn-primary waves-effect waves-light mdi mdi-phone" href="tel:+57<?php echo $row['celular_clie']; ?>"></a>
                                                            <!--  <a class="btn btn-primary waves-effect waves-light mdi mdi-google-maps" href="https://goo.gl/maps/Rieuc9G9vNbEjEfg9"></a>-->
                                                        </td>

                                                    </tr>
                                                <?php } ?>

                                            </tbody>

                                        </table>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-6">
                                <div class="card mini-stat m-b-30">
                                    <div class="p-3 bg-primary text-white">
                                        <div class="mini-stat-icon">
                                            <i class="mdi mdi-bookmark-check float-right mb-0"></i>
                                        </div>
                                        <h6 class="text-uppercase mb-0 font-weight-bold">CONTACTO PROVEEDOR</h6>
                                    </div>
                                    <div class="card-body">

                                        <div class="border-bottom pb-4">
                                            <div class="mt-4 text-muted">
                                            <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr class="text-center">

                                                    <th>ID</th>
                                                    <th>C.C</th>
                                                    <th>NOMBRE</th>
                                                    <th>CORREO</th>
                                                    <th>CELULAR</th>
                                                    <th>DIRECCION</th>
                                                    <th>EXTRAS</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php while ($row = $resultado2->fetch_assoc()) { ?>

                                                    <tr class="text-center">

                                                    <td><?php echo $row['id']; ?></td>
                                                        <td><?php echo $row['cc_prv']; ?></td>
                                                        <td><?php echo $row['nombre_prv']; ?></td>
                                                        <td><?php echo $row['correo_prv']; ?></td>
                                                        <td><?php echo $row['celular_prv']; ?></td>
                                                        <td><?php echo $row['direccion_prv']; ?></td>
                                                        <td>
                                                            <a class="btn btn-success waves-effect waves-light mdi mdi-whatsapp" href="https://api.whatsapp.com/send?phone=+57<?php echo $row['celular_prv']; ?>&text="></a>
                                                            <a class="btn btn-danger waves-effect waves-light mdi mdi mdi-gmail" href="mailto:<?php echo $row['correo_prv']; ?>"></a>
                                                            <a class="btn btn-primary waves-effect waves-light mdi mdi-phone" href="tel:+57<?php echo $row['celular_prv']; ?>"></a>
                                                            <!--  <a class="btn btn-primary waves-effect waves-light mdi mdi-google-maps" href="https://goo.gl/maps/Rieuc9G9vNbEjEfg9"></a>-->
                                                        </td>

                                                    </tr>
                                                <?php } ?>

                                            </tbody>

                                        </table>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->


                        <!-- end row 
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Email Sent</h4>

                                        <ul class="list-inline widget-chart m-t-20 text-center">
                                            <li>
                                                <h4 class=""><b>3652</b></h4>
                                                <p class="text-muted m-b-0">Marketplace</p>
                                            </li>
                                            <li>
                                                <h4 class=""><b>5421</b></h4>
                                                <p class="text-muted m-b-0">Last week</p>
                                            </li>
                                            <li>
                                                <h4 class=""><b>9652</b></h4>
                                                <p class="text-muted m-b-0">Last Month</p>
                                            </li>
                                        </ul>

                                        <div id="morris-area-example" style="height: 300px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <h4 class="mt-0 header-title">Revenue</h4>

                                        <ul class="list-inline widget-chart m-t-20 text-center">
                                            <li>
                                                <h4 class=""><b>5248</b></h4>
                                                <p class="text-muted m-b-0">Marketplace</p>
                                            </li>
                                            <li>
                                                <h4 class=""><b>321</b></h4>
                                                <p class="text-muted m-b-0">Last week</p>
                                            </li>
                                            <li>
                                                <h4 class=""><b>964</b></h4>
                                                <p class="text-muted m-b-0">Last Month</p>
                                            </li>
                                        </ul>
                                        <div id="morris-bar-example" style="height: 300px"></div>
                                    </div>
                                </div>
                            </div>

                        </div>-->
                        <!-- end row -->

                        <!-- end row -->

                      

                    </div><!-- container fluid -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            <footer class="footer">
                © 2022 <b>Distribuciones J & SANTI </b> <span class="d-none d-sm-inline-block"> - Desarrollada con <i class="mdi mdi-heart text-danger"></i> Por MT JASR COMPANY</span>
            </footer>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

    <!-- skycons -->
    <script src="assets/plugins/skycons/skycons.min.js"></script>

    <!-- skycons -->
    <script src="assets/plugins/peity/jquery.peity.min.js"></script>

    <!--Morris Chart-->
    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/plugins/raphael/raphael-min.js"></script>

    <!-- dashboard -->
    <script src="assets/pages/dashboard.js"></script>

    <!-- Required datatable js -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables/jszip.min.js"></script>
    <script src="assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="assets/pages/datatables.init.js"></script>
    <script src="codigo.js"></script>
    <script src="codigo1.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>



</body>

</html>