#Partimos de una imagen con ubuntu y apache-php7
FROM nimmis/apache-php7

#copiamos el directorio actual en la sgt ruta
COPY . /var/www/html
