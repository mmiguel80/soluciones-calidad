<?php

        $URL="http://web-back-users/index.php";
        
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$URL ."?id=" .$_POST['list_one_id']);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            $respuesta = curl_exec($ch);
            $respuestaObjeto = json_decode($respuesta);
            curl_close($ch); 
            if(empty($respuestaObjeto)){
                header("HTTP/1.1 404 Not Found");
                echo "<h4>Id no encontrado</h4>";
                echo "<p><a href='".$_SERVER['HTTP_REFERER']."'>Volver</a></p>";
            } else {
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        

            <table class='table table-striped'>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>

            <?php
            foreach($respuestaObjeto as $key => $value) {
                echo "<tr>";
                echo "<th scope='row'>";
                echo $value->id;
                echo "</th>";
                echo "<td>";
                echo $value->name;
                echo "</td>";
                echo "<td>";
                echo $value->email;
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    <body>
</html>
<?php
        }
?>