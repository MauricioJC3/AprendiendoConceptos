FROM php:8.2-fpm

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    nodejs \
    npm

# Instalar Node.js y pnpm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g pnpm

# Instalar extensiones PHP
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:2.6.5 /usr/bin/composer /usr/bin/composer

# Crear usuario no root
RUN adduser --disabled-password --gecos '' developer \
    && mkdir -p /home/developer/.composer \
    && chown -R developer:developer /home/developer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Cambiar al usuario no root
USER developer

# Comando por defecto
CMD ["php-fpm"]