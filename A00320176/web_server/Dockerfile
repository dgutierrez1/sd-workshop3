 FROM ubuntu
 
 RUN apt-get update && apt-get install apache2 -y
 RUN apt-get install php libapache2-mod-php php-mcrypt php-mysql -y
 ADD files/index.php /var/www/html/index.php
 EXPOSE 80
 #RUN docker-php-ext-install mysql mysqli pdo pdo_mysql
 # Maybe you want to install intl then
 RUN apt-get install -y libicu-dev
 RUN apt-get update && apt-get install -y zlib1g-dev libicu-dev g++
 #RUN docker-php-ext-configure intl
 #RUN docker-php-ext-install intl
 # And mbstring you may need
 #RUN docker-php-ext-inst
