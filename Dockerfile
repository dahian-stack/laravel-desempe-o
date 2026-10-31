FROM php:8.3-fpm-alpine

# Dependencias
RUN apk add --no-cache postgresql-dev

# Extensiones
RUN docker-php-ext-install pdo pdo_pgsql bcmath opcache

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Permisos — esto es lo que más falla
RUN chmod -R 777 /var/www/html/storage
RUN chmod -R 777 /var/www/html/bootstrap/cache

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
