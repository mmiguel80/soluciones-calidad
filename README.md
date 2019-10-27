## Aplicación Gestión de usuarios 
## Miguel Alameda

Aplicación básica desarrollada en PHP que consta de 3 microservicios:
- Frontend: Con un formulario para realizar varias consultas a los 2 backends.
- Backend-users: microservicio encargado de la gestión de usuarios
- Backend-groups: microservicio encargado de la gestión de 

### Documento relativo a los puntos de la práctica
https://github.com/mmiguel80/soluciones-calidad/blob/master/Practica_MiguelAlameda.pdf

### Mapa aplicación
![alt text](https://github.com/mmiguel80/soluciones-calidad/blob/master/mapa-ms.png)

### Acceso a la aplicación
Se puede acceder a la aplicación a través de un navegador, introduciendo la URL: http://35.241.210.11

### Despliegue en local con Docker
Para poder desarrollar en local, podemos constriur la aplicación con docker, de la siguiente forma:
- Creamos la red en la que convivirán los ms y los volumenes para las BBDD:
```
docker network create backend
docker volume create database-users
docker volume create database-groups
```
Construimos y desplegamos las imágenes:
Desde la raiz de proyecto/frontend:
```
docker build -t php-frontend:v1.0 -f php/Dockerfile .
docker build -t web-frontend:v1.0 -f apache/Dockerfile .

docker run -ti --name php-frontend -v "$PWD"/www:/var/www/html/ -e APP_ENV=dev --network backend -d php-frontend:v1.0
docker run -ti --name web-frontend -v "$PWD"/www:/var/www/html/ -p 8888:80 --network backend -d web-frontend:v1.0
```

Desde la raiz de proyecto/backend-users:
```
docker build -t web-back-users:v1.0 -f apache/Dockerfile .
docker build -t php-back-users:v1.0 -f php/Dockerfile .

docker run -ti --name mysql-back-users --network backend -e MYSQL_ROOT_PASSWORD=[contraseña_usuario_root] -e MYSQL_DATABASE=[nombre_bbdd] -e MYSQL_USER=[usuario_conexion_bbdd] -e MYSQL_PASSWORD=[pass_conexion_bbdd] -v "$PWD"/dump:/docker-entrypoint-initdb.d -v database-users:/var/lib/mysql -d mysql:5.7

docker run -ti --name web-back-users -e DBU_SERVER_TYPE="mysql" -e MYSQLU_DATABASE=[nombre_bbdd] -e MYSQLU_HOST=mysql-back-users -e MYSQLU_USER=[usuario_conexion_bbdd] -e MYSQLU_PASSWORD=[pass_conexion_bbdd] -v "$PWD"/www:/var/www/html/ --network backend -d web-back-users:v1.0

docker run -ti --name php-back-users -e DBU_SERVER_TYPE="mysql" -e MYSQLU_DATABASE=[nombre_bbdd] -e MYSQLU_HOST=mysql-back-users -e MYSQLU_USER=[usuario_conexion_bbdd] -e MYSQLU_PASSWORD=[pass_conexion_bbdd] -v "$PWD"/www:/var/www/html/ --network backend -d php-back-users:v1.0
```


Desde la raiz de proyecto/backend-groups:
```
docker build -t web-back-groups:v1.0 -f apache/Dockerfile .
docker build -t php-back-groups:v1.0 -f php/Dockerfile .

docker run -ti --name mysql-back-groups --network backend -e MYSQL_ROOT_PASSWORD=[contraseña_usuario_root] -e MYSQL_DATABASE=[nombre_bbdd] -e MYSQL_USER=[usuario_conexion_bbdd] -e MYSQL_PASSWORD=[pass_conexion_bbdd] -v "$PWD"/dump:/docker-entrypoint-initdb.d -v database-groups:/var/lib/mysql -d mysql:5.7

docker run -ti --name web-back-groups -e DBG_SERVER_TYPE="mysql" -e MYSQLG_DATABASE=[nombre_bbdd] -e MYSQLG_HOST=mysql-back-groups -e MYSQLG_USER=[usuario_conexion_bbdd] -e MYSQLG_PASSWORD=[pass_conexion_bbdd] -v "$PWD"/www:/var/www/html/ --network backend -d web-back-groups:v1.0

docker run -ti --name php-back-groups -e DBG_SERVER_TYPE="mysql" -e MYSQLG_DATABASE=[nombre_bbdd] -e MYSQLG_HOST=mysql-back-groups -e MYSQLG_USER=[usuario_conexion_bbdd] -e MYSQLG_PASSWORD=[pass_conexion_bbdd] -v "$PWD"/www:/var/www/html/ --network backend -d php-back-groups:v1.0

```
