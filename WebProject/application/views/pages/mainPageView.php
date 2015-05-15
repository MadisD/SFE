<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/normalize.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="/assets/css/cover.css">
    <title>KüsitlusVormid</title>
</head>
<body>

<div class="site-wrapper">

    <div class="site-wrapper-inner">

        <div class="cover-container">
            <div class="masthead clearfix">
                <div class="inner">
                    <h3 class="masthead-brand">OMAküsitlused</h3>
                    <nav>
                        <ul class="nav masthead-nav">
                            <?php
                            if ($this->session->userdata('is_logged')) {
                                echo '<li><a href="' . base_url() . '">Pealeht</a></li>';
                                echo '<li><a href="' . base_url("Main/getUsers") . '">Kasutajad</a></li>';
                                echo '<li><a href="' . base_url("NewForm") . '">Uus Vorm    </a></li>';
                                echo '<li><a href="' . base_url("MyForms") . '">Minu Küsitlused</a></li>';

                                $username = $this->session->userdata('username');
                                echo '<li><h4>'. $username .'</h4></li>';
                                echo '<li><a href="' . base_url("Logout") . '">Logout</a></li>';
                            } else {
                                echo '<li><a href="' . base_url() . '">Pealeht</a></li>';
                                echo '<li><a href="' . base_url("Register") . '">Registreeru</a></li>';
                                echo '<li><a href="' . base_url("Login") . '">Logi sisse</a></li>';
                                echo '<li><a href="' . base_url("User_Authentication") . '">Google logimine</a></li>';
                            }
                            ?>


                        </ul>
                    </nav>
                </div>
                <hr>
            </div>
          <div class="inner cover">
            <h1 class="cover-heading">Looge kiiresti endale sobiv küsimustik</h1><p class="lead">
              <a href="<?php echo base_url("NewForm") ?> " class="btn btn-lg btn-primary">Loo uus vorm</a>

          </div>


        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<div class="footer">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</div>
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
