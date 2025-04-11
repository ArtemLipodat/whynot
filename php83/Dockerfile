FROM php:8.3-fpm

# Установка таймзоны
ENV TZ=Europe/Samara


# Создание пользователя
RUN groupadd --gid 1000 user \
  && useradd --uid 1000 --gid user --shell /bin/bash --create-home user

WORKDIR /var/www

# Установка основных зависимостей
RUN apt-get update -y && apt-get upgrade -y && \
    apt-get install -y \
    libonig-dev \
    libpng-dev \
    wget \
    git \
    unzip \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    libpq-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Установка GD зависимостей
RUN apt-get update -y && apt-get install -y --no-install-recommends \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    libxpm-dev \
    libvpx-dev \
    libmagickwand-dev \
    libzip-dev \
    libgmp-dev \
    libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) gd

# Установка PHP расширений
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    pgsql \
    mysqli \
    exif \
    fileinfo \
    zip \
    intl \
    gmp \
    iconv \
    mbstring \
    xml \
    opcache \
    && docker-php-ext-enable opcache

# Установка Imagick
RUN git clone https://github.com/Imagick/imagick.git --depth 1 /tmp/imagick && \
    cd /tmp/imagick && \
    phpize && \
    ./configure && \
    make -j$(nproc) && \
    make install && \
    docker-php-ext-enable imagick && \
    rm -rf /tmp/imagick

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs && \
    npm install -g npm

USER user

CMD ["php-fpm"]

EXPOSE 9000