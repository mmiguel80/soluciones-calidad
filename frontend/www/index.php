<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <style>
            .titulo, h3{text-align: center;}
            body{position:relative; width: 100%;}
           /* form{  
                background-color: white;
                border: 2px solid black;
                margin: 0 2em;
                }
            input {position:relative; left: 1em;}*/
            .form-control {position: relative; width: 60%; left: 20%;}
            .izq {position: relative; width: 30%; float: left; margin-left: 25px;}
            .der {position: relative; width: 30%; float: right; margin-right: 25px;}
            
            .left {width: 30%; position: relative; left: 20%; border-right: 2px solid lightgrey;}
            .right {position: relative; width: 30%; float: right;  right: 20%;}
            .block {display: block; margin: 0 25px 0 25px;}
            .btn{position: relative; left: 45%;}
        </style>
    </head>
    <body>
            <br/>
            <h1 class="titulo">Formulario de gestión de usuarios y grupos</h1>
            <h1 class="titulo">Miguel Alameda</h1>
            <hr /><hr />
        
        <!-- Bloque listar todos -->    
            <div class="block">
                <div class="right">
                    <form action="groups/list_all.php" method="post">
                        <h3 for="exampleInputEmail1">Listar Grupos</h3>
                        <div class="form-group">
                            <input type="submit" name="list_all" value="Enviar" class="btn btn-primary">
                        </div>        
                    </form>
                </div>
                <div class="left">
                    <form action="users/list_all.php" method="post">
                        <h3 for="exampleInputEmail1">Listar Usuarios</h3>
                        <div class="form-group">
                            <input type="submit" name="list_all" value="Enviar" class="btn btn-primary">
                        </div>     
                    </form>
                </div>
            </div>

            <hr /><hr />

            <!-- Bloque listar uno -->  
            <div class="block">
                <div class="right">
                    <form action="groups/list_one.php" method="post">
                        <h3 for="exampleInputEmail1">Listar un grupo</h3>
                        <div class="form-group">
                            <input type="text" name="list_one_id" class="form-control" placeholder="Introduzca id" required>
                        </div>
                        <div class="form-group">    
                            <input type="submit" name="list_one" value="Enviar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="left">
                    <form action="users/list_one.php" method="post">
                        <h3 for="exampleInputEmail1">Listar un usuario</h3>
                        <div class="form-group">
                            <input type="text" name="list_one_id" class="form-control" placeholder="Introduzca id" required>
                        </div>
                        <div class="form-group">    
                            <input type="submit" name="list_one" value="Enviar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>

            <hr /><hr />

            <!-- Bloque crear -->  
            <div class="block">
                <div class="right">
                    <form action="groups/create.php" method="post">
                        <h3 for="exampleInputEmail1">Crear grupo</h3>
                        <div class="form-group">
                            <input type="text" name="create_name" class="form-control" placeholder="Introduzca nombre" required>
                        </div>
                        <div class="form-group">    
                            <input type="submit" name="create" value="Enviar" class="btn btn-primary">
                        </div> 
                    </form>
                </div>
                <div class="left">
                    <form action="users/create.php" method="post">
                        <h3 for="exampleInputEmail1">Crear usuario</h3>
                        <div class="form-group">
                            <input type="text" name="create_name" class="form-control" placeholder="Introduzca nombre" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="create_email" class="form-control" placeholder="Introduzca email" required>
                        </div>
                        <div class="form-group">    
                            <input type="submit" name="create" value="Enviar" class="btn btn-primary">
                        </div> 
                    </form>
                </div>
            </div>

            <hr /><hr />

            <!-- Bloque editar -->  
            <div class="block">
                <div class="right">
                    <form action="groups/edit.php" method="post">
                        <h3 for="exampleInputEmail1">Editar grupo</h3>
                        <div class="form-group">
                            <input type="text" name="edit_id" class="form-control" placeholder="Introduzca id" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="edit_name" class="form-control" placeholder="Introduzca nombre" required>
                        </div>
                        <div class="form-group">    
                            <input type="submit" name="edit" value="Enviar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="left">
                    <form action="users/edit.php" method="post">
                        <h3 for="exampleInputEmail1">Editar usuario</h3>
                        <div class="form-group">
                            <input type="text" name="edit_id" class="form-control" placeholder="Introduzca id" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="edit_name" class="form-control" placeholder="Introduzca nombre" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="edit_email" class="form-control" placeholder="Introduzca email" required>
                        </div>
                        <div class="form-group">    
                            <input type="submit" name="edit" value="Enviar" class="btn btn-primary">
                        </div>
                    </form> 
                </div>
            </div>

            <hr /><hr />

            <!-- Bloque eliminar -->  
            <?php
            if (isset($_ENV['APP_ENV']) && $_ENV['APP_ENV'] == "dev"){
            ?>
            <div class="block">
                <div class="right">
                    <form action="groups/delete.php" method="post">
                        <h3 for="exampleInputEmail1">Eliminar grupo (dev)</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" name="delete_id" placeholder="Introduzca id" required>
                        </div>
                        <div class="form-group">    
                            <input type="submit" name="delete" value="Enviar" class="btn btn-primary">
                        </div>
                    </form> 
                </div>
                <div class="left">
                    <form action="users/delete.php" method="post">
                        <h3 for="exampleInputEmail1">Eliminar usuario (dev)</h3>
                        <div class="form-group">
                            <input type="text" class="form-control" name="delete_id" placeholder="Introduzca id" required>
                        </div>
                        <div class="form-group">    
                            <input type="submit" name="delete" value="Enviar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>   
            <?php } ?>
    </body>
</html>