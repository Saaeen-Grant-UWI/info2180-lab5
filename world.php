<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$input = $_GET['input'];


$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if(!(empty($input))) {
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$input%'");
} else {
  $stmt = $conn->query("SELECT * FROM countries");
}


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<?php
  $tableHeaders = ["name","continent","independence_year","head_of_state"];
?>

<table>
  <tr>
    <?php foreach ($tableHeaders as $header) { ?>
      <th><?=$header?></th>
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
