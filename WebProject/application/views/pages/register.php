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
    <link rel="stylesheet" type="text/css" href="/assets/css/cover.csss">

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
				  <li class="active"><a href="register">Registreeru</a></li>
				  <li><a href="http://oma.cs.ut.ee/login">Logi sisse</a></li>
                </ul>
              </nav>
            </div>
			<hr>
          </div>

          <div class="fields">
              <?=form_open(base_url()."register")?>
                    <table>
                        <tr>
                            <td>Username
                            <td> <?=form_input(array("name"=> "username", "value" => set_value("username")))?>
                            <td> <?=form_error("username")?>
                        </tr>
                        <tr>
                            <td>Password
                            <td> <?=form_password(array("name"=> "password"))?>
                            <td> <?=form_error("password")?>
                        </tr>
                        <tr>
                            <td>Repeat password
                            <td> <?=form_password(array("name"=> "password_repeat"))?>
                            <td> <?=form_error("password_repeat")?>
                        </tr>
                        <tr>
                            <td>E-Mail Address
                            <td> <?=form_input(array("name"=> "email", "value" => set_value("email")))?>
                            <td> <?=form_error("email")?>
                        </tr>

                        <tr>
                           <td> <?=form_submit(array("name"=>"submit","value"=> "Register"))?>
                        </tr>

                    </table>
              <?=form_close()?>
          </div>


        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
