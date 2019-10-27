<?php

$URL="http://web-back-users/index.php";

    $toSend = new stdClass();
    $toSend->id= $_POST['delete_id'];
    $jsonToSend = json_encode($toSend);
    
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$URL);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$jsonToSend);
    $respuesta = curl_exec($ch);
    $status = json_decode($respuesta);
    if ($status->code == 200){
        header("HTTP/1.1 200 OK");
        $mensaje = "<h4>Usuario eliminado o no existente.</h4>";
    } elseif ($status->code == 400){
        header("HTTP/1.1 400 Bad Request");
        $mensaje = "<h4>El usuario no ha podido eliminarse.</h4>";
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        $mensaje = "<h4>Error del servidor.</h4>";
    }
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <?php
            echo $mensaje;
            echo "<p><a href='".$_SERVER['HTTP_REFERER']."'>Volver</a></p>";
        ?>
    <body>
</html>