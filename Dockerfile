# Usar la imagen oficial de PHP con Apache
FROM php:7.4-apache

# Instalar extensiones de PHP necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Configurar ServerName para evitar advertencias
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html/

# Asignar permisos adecuados a los directorios de la aplicación
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80 para acceder al servidor Apache
EXPOSE 80
