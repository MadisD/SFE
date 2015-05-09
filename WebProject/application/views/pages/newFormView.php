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
                                echo '<li><a href="' . base_url("main/getValues") . '">Kasutajad</a></li>';
                                
                                $username = $this->session->userdata('username');
                                echo '<li><h4>'. $username .'</h4></li>';
                                echo '<li><a href="' . base_url("logout") . '">Logout</a></li>';
                            } else {
                                echo '<li><a href="' . base_url() . '">Pealeht</a></li>';
                                echo '<li><a href="' . base_url("register") . '">Registreeru</a></li>';
                                echo '<li><a href="' . base_url("login") . '">Logi sisse</a></li>';
                                echo '<li><a href="' . base_url("user_authentication") . '">Google logimine</a></li>';
                            }
                            ?>
                        
                        
                        </ul>
                    </nav>
                </div>
                <hr>
            </div>
            <div class="inner cover">
    
                <form id="form" action="<?php echo base_url("NewForm/create"); ?>" method="post" >
                    <h3>Küsitluse pealkiri</h3>
                    <input type="text" name="pealkiri" required/>
                    <h3 id="text1">Kirjeldus</h3>
                    <input type="text" name="kirjeldus"/>
                    <br/>

                    <div id="form-body">

                    </div>

                    <br/>
                    <input class="form-submit" type="submit" value="Loo"/>

                </form>
                
            </div>

            <div class="top-right" >
                <button onclick="newTextField()">Lisa vabatekstiga küsimus</button>

                <button onclick="resetForm()">Puhasta väljad</button>

            </div>
        
        
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