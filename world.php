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
       echo '<table> <tr>  <th>   Name   </th>  <th>   Continent   </th>  <th>   Independence   </th>  <th>   Head of State   </th>  </tr>';
       echo "<tr>  <td>". $countries['name'].  "</td>   <td>".  $countries['continent'].  "</td>    <td>".  $countries['independence_year'].  "</td>    <td>".   $countries['head_of_state'].   "</td>  </tr>";
       echo '</table>';
      exit();
    }
  }
}



?>
<table> 
  <tr>  
    <th>Name</th>
    <th>Continent</th>  
    <th>Independence</th>  
    <th>Head of State</th>
  <tr>
<?php foreach ($results as $row): ?>
 <tr>  
  <td><?= $row['name']?></td> 
  <td><?= $row['continent'] ?></td>
  <td><?= $row['independence_year']?></td>
  <td><?= $row['head_of_state']?></td> 
 </tr>
  
<?php endforeach; ?>
</table>

