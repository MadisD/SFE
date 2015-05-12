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
                <script>
                    if(typeof(EventSource) !== "undefined") {
                        var source = new EventSource("http://oma.cs.ut.ee/UserCounter/getCount");
                        source.onmessage = function(event) {
                            document.getElementById("user_count").innerHTML = event.data;
                        };

                        var source2 = new EventSource("http://oma.cs.ut.ee/UserCounter/getUsers");
                        var last = 0;
                        source2.onmessage = function(event) {
                            if (last < parseInt(event.lastEventId) && last !== 0) {
                                pieces = event.data.split("|");
                                document.getElementById("users").innerHTML += "<p>Kasutajanimi: "+pieces[0]+"</p>";
                                document.getElementById("users").innerHTML += "<p>Email: "+pieces[1]+"</p>";
                                document.getElementById("users").innerHTML += "</br>";
                            }
                            last = parseInt(event.lastEventId);

                        };

                    } else {
                        document.getElementById("user_count").innerHTML = "Sorry, your browser does not support server-sent events...";
                    }

                </script>

                <div id="user_count">


                </div>


                <div id="users">

                    <?php
                    foreach ($results as $row) {
                        echo "<p>Kasutajanimi: $row->name</p>";
                        echo "<p>E-Mail: $row->email</p>";
                        echo "<br/>";
                    }
                    ?>


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
