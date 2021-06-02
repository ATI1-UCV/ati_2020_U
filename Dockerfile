#Partimos de ubuntu
FROM nimmis/apache-php7

#copiamos el directorio actual en la ruta para 
COPY . /var/www/html

