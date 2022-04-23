<?php

                require "conexion.php";

                session_start();

                if (isset($_GET['cerrar_sesion'])) {
                    session_unset();

                    session_destroy();
                }

                if (isset($_SESSION['rol'])) {
                    switch ($_SESSION['rol']) {
                            case 1:
                           header('Location: principal copy.php');
                            break;


                            case 2:
                                header('Location: vendedor.php');
                                break;


                                default:
                    }
                }

                if (isset($_POST['username']) && isset($_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

              

                    $query = $bd->prepare('SELECT*FROM tb_usuario2 WHERE username = :username AND password = :password');
                    $query->execute(['username' => $username, 'password' => $password]);

                    $row = $query->fetch(PDO::FETCH_NUM);
                    if ($row == true) {
                        $rol = $row[3];
                        $_SESSION['nombre'] = $row['nombre'];
                        $_SESSION['rol'] = $rol;

                                switch ($_SESSION['rol']) {
                                    case 1:
                                header('Location: administrador.php');
                                    break;


                                    case 2:
                                        header('Location: vendedor.php');
                                        break;


                                        default:
                            }
                    }else {
                        # code...
                        echo "El usuario o contraseña son incorrectos";
                    }

                }

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Distribuciones J&SANTI</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/images/logo.png">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>


<body class="fixed-left">



    <!-- Begin page -->
    <div class="accountbg">

        <div class="content-center">
            <div class="content-desc-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-8">
                            <div class="card">
                                <div class="card-body">

                                    <h3 class="text-center mt-0 m-b-15">
                                        <a href="index copy.html" class="logo logo-admin"><img src="assets/images/logo.png" height="200" alt="logo"></a>
                                    </h3>

                                    <h4 class="text-muted text-center font-18"><b>Iniciar sesión</b></h4>

                                    <div class="p-2">
                                        <form method="POST"  class="form-horizontal m-t-20" >

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" type="text" required="" placeholder="Nombre de usuario" name="username">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" type="password" required="" placeholder="password" name="password">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                        <label class="custom-control-label" for="customCheck1">Recordarme</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group text-center row m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Iniciar sesión</button>
                                                </div>
                                            </div>
                                            <!--CREAR CUENTA / OLVIDO SU CLAVE-->
                                            <!-- <div class="form-group m-t-10 mb-0 row">
                                                    <div class="col-sm-7 m-t-20">
                                                        <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> ¿Olvidaste tu contraseña?</a>
                                                    </div>
                                                    <div class="col-sm-5 m-t-20">
                                                        <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
                                                    </div>-->
                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    </div>

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

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>

</html>