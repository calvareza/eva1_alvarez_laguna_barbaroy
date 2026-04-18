# Usamos la versión Alpine por ser ligera y profesional
FROM php:8.2-fpm-alpine

# Instalamos dependencias básicas del sistema
RUN apk add --no-cache \
    bash \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip

# INSTALACIÓN CRÍTICA: Esto permite que Laravel se conecte a MySQL
RUN docker-php-ext-install pdo_mysql gd bcmath

# Instalamos Composer para manejar las librerías de Laravel
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /var/www/html

# Permisos para que Laravel pueda escribir en carpetas de caché
RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000

CMD ["php-fpm"]