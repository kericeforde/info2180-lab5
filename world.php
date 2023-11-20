<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

// Getting the input.
if (isset($_GET['country'])){
  $country=$_GET['country'];
}else{$country="";
}
if (isset($_GET['lookup'])){
  $lookup=$_GET['lookup'];
}


//Gtting data from the world.sql file

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries  WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$cit = $conn->query("SELECT  cities.name AS cityname, cities.population, cities.district, countries.* FROM cities JOIN countries ON cities.country_code=countries.code WHERE countries.name = '$country' ");
$citable=$cit->fetchAll(PDO::FETCH_ASSOC);

//Sanitizing inputs
$country=htmlspecialchars(strip_tags($country));





//Searching through the table for the country entered
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
// When lookup is set to cities.
if ($lookup!="" ){
  
    echo '<table> <tr>  <th>   Name </th> <th>   District  </th>  <th>   Population </th>  </tr>';
    foreach($citable as $cities){
     echo "<tr>  <td>". $cities['cityname'].  "</td>   <td>".  $cities['district'].  "</td>    <td>".  $cities['population']."</td>  </tr>";
   
    
   
}   echo '</table>';  exit(); 
  } 




//Outputting all the data of the table.
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

