<?php
$user_session = session();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/png" href="<?= base_url('images/tienda.png') ?>">
    <title>Punto de venta</title>
    <!-- css  -->
    <link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" />
    <script src="<?php echo base_url(); ?>/css/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">

    <?php print_r($user_session->nombre); ?>

    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Iniciar Sesion</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?php echo base_url(); ?>/usuarios/valida" autocomplete="off">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="usuario" name="usuario" type="text" placeholder="Usuario" />
                                            <label for="usuario">Usuario</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" name="password" type="password" placeholder="password" />
                                            <label for="password">Password</label>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit">Login</button>
                                        </div>
                                        <br>
                                        <?php if (isset($validation)) { ?>
                                            <div class="alert alert-danger">
                                                <?php echo $validation->listErrors(); ?>
                                            </div>
                                        <?php } ?>

                                        <?php if (isset($error)) { ?>
                                            <div class="alert alert-danger">
                                                <?php echo $error; ?>
                                            </div>
                                        <?php } ?>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Alanny Chaverri <?php echo date('Y') ?></div>
                        <div>
                            <a target="_blank" href="https://github.com/AlannyChaverri">GitHub</a>
                            &middot;
                            <a target="_blank" href="https://www.linkedin.com/in/alanny-chaverri-molina/">linkedIn</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- pie -->
    <script src="<?php echo base_url(); ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>/js/simple-datatables@latest.js"></script>
    <script src="<?php echo base_url(); ?>/js/datatables-simple-demo.js"></script>
</body>

</html>