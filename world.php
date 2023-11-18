<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';


if (isset($_GET['country'])){
  $country=$_GET['country'];
}else{$country="";}

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);



$country=htmlspecialchars(strip_tags($country));
if($country!=""){
  foreach($results as $countries){
    if (strcasecmp($country,$countries['name'])==0){
      echo $countries['name'] . ' is ruled by ' . $countries['head_of_state'];
      exit();
    }
  }
}



?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
