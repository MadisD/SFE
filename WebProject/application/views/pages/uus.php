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

                        </ul>
                    </nav>
                </div>
                <hr>
            </div>
			
			<div class="row">
				<div class="col-sm-8">
					<form id="demo"></form>
				</div>
				<div class="col-sm-4">
					<input type="number" min="0" id="textfield1" value=""><button onclick="myTextfield()">Textfield</button><br>
					<input type="number" min="0" id="textfield2" value=""><button onclick="myRadiobutton()">Radiobutton</button><br>
					<input type="number" min="0" id="textfield3" value=""><button onclick="myCheckbox()">Checkbox</button><br>
					<button onclick="myReset()">Reset</button><br>
					
				</div>
			</div>
			
			
            <div class="inner cover">
                <h1 class="cover-heading">Antud leht on hetkel valmimisel.</h1>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/assets/js/form.js"></script>

</body>
</html>
