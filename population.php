
<!DOCTYPE html>
<body>
<h2>Welcome to population data online.</h2>
	<p>
		<h4>Click one of the cities below, or add one to your URL to view the population data.</h4>
	</p>

<?php

$localhost = '127.0.0.1';
$username = 'root';
$password = '';
$connection = mysql_connect($localhost, $username, $password);

if (!$connection) {
  die('Unable to connect: ' . mysql_errno());
}

$city = $_GET['city']; 

if ($connection) {
	$db_selected = mysql_select_db('day_4_exercises');
    $result = mysql_query('SELECT city_name, population FROM population');
}

while ($row = mysql_fetch_array($result)) {
    	// echo 'The population of' . "<a href=/Zoe/day-4-exercises/population.php?city=" . urlencode($row['city_name']) . 
		// ">" . $row['city_name'] . "</a>" . ' is ' . $row['population'] . "<br>";

	echo "<a href=/Zoe/day-4-exercises/population.php?city=" . urlencode($row['city_name']) . ">" . $row['city_name'] . "</a>" . "<br>";
	if($city == $row['city_name']){
		$value = $row['population'];
	}
}

	echo "<br>";

    echo 'The population of ' . $city . ' is ' . $value . "<br>";

mysql_close($connection);
?>

</body>
</html>
