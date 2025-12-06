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



?>

<table>

    <thead>

        <tr>
            <th><b>Name<b></th>

            <th><b>Continent<b></th>
            <th><b>Independence  <b></th>
            
            <th><b>Head of state<b></th>



        </tr>


    </thead>


    <tbody>

        <?php foreach ($ans as $row): ?>
        <tr>
            <td><?= $row['name'];?></td>

            <td><?= $row['continent'];?></td>

            <td><?= $row['independence_year'];  ?></td>
            
            <td><?= $row['head_of_state'];?></td>
        </tr>


        <?php endforeach; 
        ?>

    </tbody>

</table>
