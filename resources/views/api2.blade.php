 <?php
	$apiCall = curl_init("https://restcountries.eu/rest/v2/all");
	curl_setopt($apiCall, CURLOPT_RETURNTRANSFER, 1);
	$apiOutput = curl_exec($apiCall);
	curl_close($apiCall);
	$countries = json_decode($apiOutput, true);

	// $countries = ['Argentina', 'Brasil', 'Colombia', 'Perú'];

	$countryInPost = '';

	if ($_POST) {
		$countryInPost = $_POST['countries'];

	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Test Select</title>
	</head>
	<body>
		<form method="post">
			<select name="countries">
				<option value=""> Elegí </option>
				<?php foreach ($countries as $country): ?>
					<option
						value="<?= $country['name']; ?>"
						<?= $countryInPost == $country['name'] ? 'selected' : null ?>
					>
						<?= $country['name']; ?>
					</option>
				<?php endforeach; ?>
			</select>
			<br>
			<button type="submit">Enviar</button>
		</form>
	</body>
</html>
