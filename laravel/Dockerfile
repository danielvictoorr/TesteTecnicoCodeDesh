# Dockerfile
FROM php:8.2-apache

# Instala dependências necessárias
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Ativa o mod_rewrite do Apache
RUN a2enmod rewrite

# Copia os arquivos da aplicação para o container
COPY . /var/www/html

# Define o diretório de trabalho
WORKDIR /var/www/html

# Permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
