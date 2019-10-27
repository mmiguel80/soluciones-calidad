<?php
header('Content-Type: application/json');
include('lib/functions.php');

if($_SERVER['REQUEST_METHOD']=="GET")
{
  if(isset($_GET['id']))
  {
    $id =  $_GET['id'];
    $json = get_single_group_info($id);
    if(empty($json))
    header("HTTP/1.1 404 Not Found");
    echo json_encode($json);
  }
  else{
    $json = get_all_group_list();
    echo json_encode($json);
  }
}


if($_SERVER['REQUEST_METHOD']=="POST")
{
  $test = urldecode(file_get_contents( 'php://input' ));
  $data = json_decode( $test, true );
  $name = $data['name'];  
  
  $json = add_group_info($name);
  echo json_encode($json);
}

if($_SERVER['REQUEST_METHOD']=="PUT")
{
  $data = json_decode( file_get_contents( 'php://input' ), true );
  
  $id = $data['id'];
  $name = $data['name'];
  
  $json = update_group_info($id,$name);
  echo json_encode($json);
}

if($_SERVER['REQUEST_METHOD']=="DELETE")
{
  $data = json_decode( file_get_contents( 'php://input' ), true );
  
  $id = $data['id'];
  
  $json = delete_group_info($id);
  echo json_encode($json);
}
?>