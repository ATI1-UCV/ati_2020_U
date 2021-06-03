FROM ubuntu:16.04
RUN apt-get update
RUN apt-get install -y nano
RUN apt-get install -y vim
RUN apt-get install -y php
RUN apt-get install -y apache2
COPY 28015794.jpg /var/www/html
COPY config.json /var/www/html
COPY perfil.css /var/www/html
COPY perfil.json /var/www/html
COPY perfil.php /var/www/html