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
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
