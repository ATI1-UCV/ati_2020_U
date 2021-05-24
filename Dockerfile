FROM php:7.4-apache

COPY ./000-default.conf /etc/apache2/sites-enabled/000-default.conf
COPY ./ /var/www/html/

EXPOSE 80
