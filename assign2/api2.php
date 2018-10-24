<?php

$name = '';
if (isset($_GET['name'])) {
  $name = $_GET['name'];
}

if (isset($_POST['name'])) {
  $name = $_POST['name'];
}

$data = file_get_contents('php://input');
$data = json_decode($data, TRUE);
$name = $data ['name'];

$contacts = array (
  array ("name" => "Mohammed1", "Phone"=>"905425400161", "Email"=> "me1@bymsaudi.com" ),
  array ("name" => "Mohammed2", "Phone"=>"905425400162", "Email"=> "me2@bymsaudi.com" ),
  array ("name" => "Mohammed Saudi", "Phone"=>"905425400163", "Email"=> "me3@bymsaudi.com" )
);


$results = array();

if(isset($name)) {
  foreach ($contacts as $contact){
    //print_r($contact);
    if(strpos(strtoupper($contact['name']),strtoupper($name)) !== false)
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
