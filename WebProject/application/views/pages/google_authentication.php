<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="/assets/css/google.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
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
                        </ul>
                    </nav>
                </div>
                <hr>
            </div>


            <div class="inner cover">
                <div id="main">
                    <div id="envelope">
                        <?php if (isset($authUrl)){ ?>
                            <header id="sign_in">
                                <h2>Google </h2>
                            </header>
                            <hr>
                            <div id="content">
                                <div class="col-md-5">
                                    <a href="<?php echo $authUrl; ?>">
                                        <button type="button" class="btn btn-danger btn-lg">Logi sisse</button></a>
                                </div>
                                <div class="col-md-5">
                                    <a href="/"><button type="button" class="btn btn-default btn-lg">Cancel</button></a>
                                </div>
                            </div>
                            <!-- <img id="google_signin" src="<?php echo base_url(); ?>/assets/images/sign-in-button.jpg" alt="Sign In" > -->
                        <?php }else{ ?>
                            <header id="info">
                                <a target="_blank" class="user_name" href="<?php echo $userData->link; ?>" /><img class="user_img" src="<?php echo $userData->picture; ?>" width="15%" />
                                <?php echo '<p class="welcome"><i>Welcome ! </i>' . $userData->name . "</p>"; ?></a><a class='logout' href='/User_Authentication/logout'>Logout</a>
                            </header>
                            <?php
                            echo "<p class='profile'>Profile :-</p>";
                            echo "<p><b> First Name : </b>" . $userData->given_name . "</p>";
                            echo "<p><b> Last Name : </b>" . $userData->family_name . "</p>";
                            echo "<p><b>Email : </b>" . $userData->email . "</p>";
                            ?>
                        <?php }?>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

</body>
</html>