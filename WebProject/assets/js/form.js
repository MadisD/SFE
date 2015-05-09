function myReset() {
	document.getElementById("demo").innerHTML = "";
}

function resetForm() {
    document.getElementById("form").innerHTML = '<h3>Küsitluse pealkiri</h3>'+
    '<input type="text" name="pealkiri" required/>'+
    '<h3 id="text1">Kirjeldus</h3>'+
    '<input type="text" name="kirjeldus"/>' +
    '</br>' +
    '<div id="form-body">' +
    ' </div>' +
    ' <br/>' +
    ' <input class="form-submit" type="submit" value="Loo"/>';
}

function newTextField() {
    var count = document.getElementsByClassName("textfield").length;
    document.getElementById("form-body").innerHTML += '<label for="text'+count+'">Sisesta küsimus siia</label>';
    document.getElementById("form-body").innerHTML += ' <input type="text" class="textfield textfield'+count+
    '" name="textfield'+count+
    '" required/>' +
    '</br>';
}


function myTextfield() {
	i = 0;
	while (i < document.getElementById('textfield1').value) {
		document.getElementById("demo").innerHTML += '<input type="text" name="firstname">:<input type="text" value=""><br>';
		i++;
		}
	document.getElementById("demo").innerHTML += "<br>";
}
function myRadiobutton() {
	i = 0;
	while (i < document.getElementById('textfield2').value) {
		document.getElementById("demo").innerHTML += '<input type="radio" name="nimi" value="v��rtus"><input type="text" value=""><br>';
		i++;
		}
	document.getElementById("demo").innerHTML += "<br>";
}
function myCheckbox() {
	i = 0;
	while (i < document.getElementById('textfield3').value) {
		document.getElementById("demo").innerHTML += '<input type="checkbox" name="vehicle" value="Bike"><input type="text" value=""><br>';
		i++;
		}
	document.getElementById("demo").innerHTML += "<br>";
}