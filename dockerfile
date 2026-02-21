FROM php:8.2-apache

# 1. Install Library
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# 2. Install Ekstensi PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 3. Aktifkan mod_rewrite
RUN a2enmod rewrite

# 4. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Set Folder Kerja
WORKDIR /var/www/html

# 6. Copy Codingan
COPY . .

# 7. [JURUS PAMUNGKAS] Copy settingan Apache manual kita ke dalam container
# Ini akan menimpa settingan default bawaan Docker
COPY vhost.conf /etc/apache2/sites-available/000-default.conf

# 8. Atur Hak Akses Folder
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache