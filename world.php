<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);



$c = $_GET['country'];

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$c%'");
$ans = $stmt->fetchAll(PDO::FETCH_ASSOC);

$lookup =  isset($_GET['lookup']) ? $_GET['lookup'] : '';

if ($lookup == 'cities') {

  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries ON cities.country_code = countries.code WHERE countries.name LIKE '%$c%'");
  //it really just a different query to do excersize 5 
  
  $ans = $stmt->fetchAll(PDO::FETCH_ASSOC);

  ?>

<table>

    <thead>

        <tr>
            <th><b>Name<b></th>

            <th><b>District<b></th>
            <th><b>Population <b></th>





        </tr>


    </thead>


    <tbody>

        <?php foreach ($ans as $row): ?>
        <tr>
            <td><?= $row['name'];?></td>

            <td><?= $row['district'];?></td>

            <td><?= $row['population'];  ?></td>
            

        </tr>


        <?php endforeach; 
        ?>

    </tbody>

</table>


<?php }
else

{?>

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
<?php } ?>
