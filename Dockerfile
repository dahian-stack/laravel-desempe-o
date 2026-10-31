FROM php:8.3-fpm-alpine

# Dependencias del sistema
RUN apk add --no-cache postgresql-dev git unzip

# Extensiones de PHP
RUN docker-php-ext-install pdo pdo_pgsql bcmath opcache

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos
COPY . .

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Generar clave y limpiar caché
RUN php artisan key:generate --force
RUN php artisan config:clear
RUN php artisan cache:clear

# Permisos correctos
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Crear tablas
RUN php artisan migrate --force

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
