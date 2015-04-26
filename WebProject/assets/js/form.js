function myReset() {
	document.getElementById("demo").innerHTML = "";
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
		document.getElementById("demo").innerHTML += '<input type="radio" name="nimi" value="väärtus"><input type="text" value=""><br>';
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