<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$input = htmlspecialchars($_GET["country"]);

$tableHeaders = [];

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if(array_key_exists('lookup',  $_GET)) {
  $tableHeaders = ["name","district","population",];
  $stmt = $conn->query("SELECT cities.* FROM cities JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$input%'");
} else {
  $tableHeaders = ["name","continent","independence_year","head_of_state"];
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$input%'");
}

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!-- 
  The implementation of the table allows for the dynamic addition of columns 
  and their data via the tableHeaders array as long as they exist in the world database.
  example; you may add country_code to the first implimentation of tableHeaders
-->
<table>
  <tr>
    <?php foreach ($tableHeaders as $header) { ?>
      <th><?=ucwords(str_replace("_"," ",$header))?></th>
    <?php } ?>  
  </tr>
  <?php foreach ($results as $result) { ?>
  <tr>
    <?php foreach ($tableHeaders as $key => $value) { ?>
          <td><?=$result[$value]?></td>
    <?php } ?>
  </tr>
  <?php } ?>

</table>
