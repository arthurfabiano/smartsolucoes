# Use a imagem oficial do PHP com o Apache
FROM php:8.0-apache

# Instale o Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Atualize o sistema e instale dependências adicionais, se necessário
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
    autoconf \
    build-essential \
    apt-utils \
    zlib1g-dev \
    libzip-dev \
    unzip \
    zip \
    curl \
    libmagick++-dev \
    libmagickwand-dev \
    libpq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \ 
    libxpm-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

    # Instale extensões PHP necessárias
    RUN docker-php-ext-configure gd \
        --with-jpeg=/usr/include/ \
        --with-freetype=/usr/include/

    RUN docker-php-ext-configure zip

    RUN docker-php-ext-install gd intl pdo_mysql pdo_pgsql mysqli zip soap

    RUN docker-php-ext-enable soap

    RUN docker-php-ext-configure exif

    RUN docker-php-ext-install exif

    RUN docker-php-ext-enable exif

    RUN docker-php-ext-install sockets

    RUN docker-php-ext-enable sockets

    RUN docker-php-ext-install bcmath

    RUN docker-php-ext-enable bcmath

    RUN docker-php-ext-install calendar

    RUN docker-php-ext-enable calendar

    # Habilite o módulo de reescrita do Apache
    RUN a2enmod rewrite