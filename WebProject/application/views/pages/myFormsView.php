<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/normalize.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"> -->

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
                                echo '<li><a href="' . base_url("main/getUsers") . '">Kasutajad</a></li>';
                                echo '<li><a href="' . base_url("NewForm") . '">Uus Vorm    </a></li>';
                                echo '<li><a href="' . base_url("MyForms") . '">Minu Küsitlused</a></li>';

                                $username = $this->session->userdata('username');
                                echo '<li><h4>'. $username .'</h4></li>';
                                echo '<li><a href="' . base_url("logout") . '">Logout</a></li>';
                            } else {
                                echo '<li><a href="' . base_url() . '">Pealeht</a></li>';
                                echo '<li><a href="' . base_url("register") . '">Registreeru</a></li>';
                                echo '<li><a href="' . base_url("login") . '">Logi sisse</a></li>';
                                echo '<li><a href="' . base_url("User_Authentication") . '">Google logimine</a></li>';
                            }
                            ?>


                        </ul>
                    </nav>
                </div>
                <hr>
            </div>
            <div class="inner cover">



                <?php

                if (count($forms) == 0) {
                    echo '<h3 class="myFormH">Sul ei ole hetkel ühtegi küsitlust</h3>';
                } else {
                    echo '<h3 class="myFormH">Minu Küsitlused</h3>';
                foreach ($forms as $key => $value) {

                    echo '<table class="table">';
                    echo '<tr><th>#</th> <th>Pealkiri</th>  <th>Kirjeldus</th> <th>Loodud</th></tr><tr>';

                    echo '<td class="my-form-table-header" >'.$key.'</td>';
                    echo '<td> '.$value['pealkiri'].'</td>';
                    if (strlen($value['kirjeldus']) > 0) {
                        echo '<td>'. $value['kirjeldus'].'</td>';
                    } else {
                        echo '<td> -  </td>';
                    }
                    echo '<td>'.$value['date'].'</td></tr>';



                    echo '<tr><td><form method="get" action="'.base_url("MyForms/deleteForm").'/' . $value['form_id'].'"> <input class="btn btn-danger btn-sm" type="submit" value="Kustuta Vorm"/></form></td>';
                    echo '<td><form method="get" action="'.base_url("Form/getForm").'/' . $value['form_id'].'"><input class="btn btn-info btn-sm" type="submit" value="Vaata Vormi"/></form></td>';
                    echo '<td><form method="get" action="'.base_url("Statistics/getData").'/' . $value['form_id'].'"><input class="btn btn-primary btn-sm" type="submit" value="Vaata Vastuseid"/></form></td><td></td></tr>';
                    echo '</table>';
                    echo '</br>';
                }
                }

                ?>



        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="/assets/js/form.js"></script>
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
