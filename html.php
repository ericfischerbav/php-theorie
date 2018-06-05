<!-- Grundstuktur von HTML -->
<html>

<head>

</head>

<body>
<h1>&Uuml;berschrift</h1>
<br />

<form action="html.php" method="post">
	<input type="text" name="name" />
	<input type="password" name="password" />
	<select name="select">
		<option value="0">Beschreibung des Werts</option>
	</select>
	<textarea>Dieser Text steht schon drin.</textarea>
	<input type="checkbox" name="checkboxen[]" value="1" />
	<input type="checkbox" name="checkboxen[]" value="2" />
	<input type="checkbox" name="checkboxen[]" value="3" />
	<input type="radio" checked name="radio-group" value="1" id="radio-1" /><label for="radio-1">Beschreibung</label>
	<input type="radio" name="radio-group" value="2" />
	<?php echo '<input type="radio" name="radio-group" value="3" />';?>
	<input type="submit" value="Text auf dem Button" />
	<button type="submit">Text auf dem Button</button>
</form>

</body>

</html>