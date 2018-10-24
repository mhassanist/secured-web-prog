<?php

$name = '';
if (isset($_GET['name'])) {
  $name = $_GET['name'];
}
/*
if (isset($_POST['name'])) {
  $name = $_POST['name'];
}*/
/*
$data = file_get_contents('php://input');
$data = json_decode($data, TRUE);
$name = $data ['name'];*/

/**** Connect to MYSQL using mysqli procedural PHP ***/

$servername = "localhost";
$username 	= "root";
$password 	= "";
$dbname 		= "contacts";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//	echo "Connected successfully";

$sql = "SELECT * FROM contact";

$con_results = mysqli_query($conn, $sql);

$contacts = array();
while($row = mysqli_fetch_assoc($con_results)) {
  $contacts[]=$row;
}

//print_r($contacts);

$results = array();

if(isset($name)) {
  foreach ($contacts as $contact){
    //print_r($contact);
    $full_name = $contact['first_name']." ".$contact['last_name'];
    if(strpos(strtoupper($full_name),strtoupper($name)) !== false)
    $results[] = $contact;
  }
}

print_r(json_encode($results));

//Read parameters from GET
//$name = $_GET['name'];

//Read parameters from POST BODY (form-fields)
//$name = $_POST['name'];

//Read parameters from POST BODY (raw-json)
/*
$data = file_get_contents('php://input');
$data = json_decode($data, TRUE);
$name = $data ['name'];

*/

//print_r(json_encode($results));
?>
