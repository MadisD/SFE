<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="/assets/css/cover.css">

    <title>OMAküsitlused</title>
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
                  <li><a href="/">Pealeht</a></li>
				  <li><a href="register">Registreeru</a></li>
				  <li class="active"><a href="login">Logi sisse</a></li>
                </ul>
              </nav>
            </div>
			<hr>
          </div>

          <div class="inner cover">
                      <div class="row">
                          <div class="col-lg-4"></div>
                          <div class="col-lg-4 col-sm-4 well">
                              <?php
                              $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
                              echo form_open("login/index", $attributes);?>
                              <fieldset>
                                  <legend>Login</legend>
                                  <div class="form-group">
                                      <div class="row colbox">
                                          <div class="col-lg-4 col-sm-4">
                                              <label for="txt_username" class="control-label">Username</label>
                                          </div>
                                          <div class="col-lg-8 col-sm-8">
                                              <input class="form-control" id="txt_username" name="txt_username" placeholder="Username" type="text" value="<?php echo set_value('txt_username'); ?>" />
                                              <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="row colbox">
                                          <div class="col-lg-4 col-sm-4">
                                              <label for="txt_password" class="control-label">Password</label>
                                          </div>
                                          <div class="col-lg-8 col-sm-8">
                                              <input class="form-control" id="txt_password" name="txt_password" placeholder="Password" type="password" value="<?php echo set_value('txt_password'); ?>" />
                                              <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <div class="col-lg-12 col-sm-12 text-center">
                                          <input id="btn_login" name="btn_login" type="submit" class="btn btn-primary" value="Login" />
                                          <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Reset" />
                                          <a href="/"><p class="btn btn-danger" id="cancelbtn">Cancel</p></a>
                                      </div>
                                  </div>
                              </fieldset>
                              <?php echo form_close(); ?>
                              <?php echo $this->session->flashdata('msg'); ?>
                          </div>
                      </div>


          </div>


        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
