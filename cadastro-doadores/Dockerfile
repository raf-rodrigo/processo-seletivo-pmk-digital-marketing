FROM php:8.1-apache

# Instala extensões PDO
RUN docker-php-ext-install pdo pdo_mysql

# Configurações adicionais
RUN a2enmod rewrite

# Copia os arquivos do projeto
COPY . /var/www/html
WORKDIR /var/www/html

# Define permissões
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
