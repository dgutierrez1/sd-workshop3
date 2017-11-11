# Workshop3 - Daniel Gutierrez A00320176


Para este taller se utilizo Docker con Docker-compose para el aprovisionamiento automatico de infraestructura. 

La infraestructura esta compuesto por:
- Servidor PHP con Apache
- Servidor de base de datos con MySQL

## Servidor PHP + Apache

```Dockerfile
 FROM ubuntu

 RUN apt-get update && apt-get install apache2 -y
 RUN apt-get install php libapache2-mod-php php-mcrypt php-mysql -y
 RUN apt-get install ssh -y
 #ADD files/apache2.conf /etc/apache2/apache2.conf
 ADD ./files/index.php /var/www/html/index.php
 EXPOSE 80
 EXPOSE 8080

 CMD service ssh start && service apache2 start && tail -f /var/log/apache2/access.log
```

## Servidor de base de datos MySQL

```Dockerfile
FROM ubuntu

ADD files/ /temp/

RUN apt-get update -y --fix-missing

RUN apt-get install expect -y

WORKDIR /temp

#RUN apt-get install mysql-server -y
RUN chmod +x configure_mysql.sh
RUN ./configure_mysql.sh

EXPOSE 3306

CMD  /etc/init.d/mysql start && tail -f /var/log/mysql/error.log
```

Para manejar el aprovisionamiento de ambos contenedores se usara docker-compose. En un archio `docker-compose.yml` se declararan las caracteristicas y relaciones de los multiples contenedores, asi:

 ```yml
 version: '2'

services:
 web:
  container_name: wb-php-apache
  build: ./web_server/
  ports:
   - "8080:80"
   - "2222:22"
  volumes:
   - ./www:/var/www/html
  links:
   - db
 db:
  container_name: db-mysql
  build: ./db_server/
  volumes:
   - /var/lib/mysql
  ports:
   - 3307:3306
  environment:
   MYSQL_ROOT_PASSWORD: password
   MYSQL_USER: admin
   MYSQL_PASSWORD: password
   MYSQL_DATABASE: db_dist
 ```
 Dado que en mi equipo docker no estaba funcionando use Docker en una maquina virtual. Para probar el funcionamiento use `curl` para hacer las mismas peticiones que haria el navegador.
 
 
 
