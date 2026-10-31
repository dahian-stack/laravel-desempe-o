
# ==========================================
# ETAPA 1: Construir los archivos de Vite
# ==========================================
FROM node:22-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json ./

RUN npm ci

COPY . .

RUN npm run build


# ==========================================
# ETAPA 2: Preparar Laravel y PHP
# ==========================================
FROM php:8.3-cli-alpine

# Dependencias necesarias para extensiones PHP
RUN apk add --no-cache oniguruma-dev libxml2-dev

# Extensiones PHP para Laravel y MySQL
RUN docker-php-ext-install \
    mbstring \
    pdo_mysql \
    bcmath \
    opcache \
    xml

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar proyecto
COPY . .

# Crear directorios necesarios
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    bootstrap/cache

# Instalar dependencias de Laravel
RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --no-progress \
    --optimize-autoloader

# Copiar archivos compilados de Vite
COPY --from=frontend /app/public/build ./public/build

# Permisos de Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Puerto de Render
EXPOSE 10000

# Iniciar Laravel usando el puerto asignado por Render
CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]
