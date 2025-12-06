<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");



$c = $_GET['country'];

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$c%'");
$ans = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<ul>";
foreach ($ans as $row) 
  {
    echo "<li>" . " The country of " . $row['name'] . " is ran by " . $row['head_of_state'] ."</li>";


}
echo "</ul>";
?>
