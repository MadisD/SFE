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
                <h1 class="cover-heading">Looge kiiresti endale sobiv küsimustik</h1><p class="lead">

                    <?php
                    echo 'Küsitluse looja -> ' . $form_data['name'];
                    echo '</br>';
                    echo 'Pealkiri -> ' . $form_data['pealkiri'];
                    echo '</br>';
                    if (strlen($form_data['kirjeldus'])>0) {
                        echo 'Kirjeldus -> ' . $form_data['kirjeldus'];
                        echo '</br>';
                    }
                    echo 'Küsitlus loodi -> ' . $form_data['date'];
                    echo '</br>';


                    ?>
    
                <form method="post" action="<?php echo base_url('Form/submit') ?>">
                    <?php
                    $textCount = 0;
                    $radioCount = 0;
                    $optionCount = 0;
                    foreach ($form_data['sisu'] as $row) {
                        $type =  $row['form_type'];
                        if ($type == 1) {

                            echo '<label for="textfield'.$textCount.'">'.$row['content'].'</label>';
                            echo '<input type="text" name="textfield'.$textCount.'" required/>';
                            echo '</br>';
                            $textCount++;
                        }
                    }
                    ?>
                    <input type="hidden" name="form_id" value="<?php echo $form_id; ?>">

                    <input type="submit" value="Salvesta vastused"/>
                </form>


            </div>


        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
