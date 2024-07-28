FROM php:7.2-apache
# Install necessary php extensions 
# Install system dependencies and PHP extensions
# RUN apt-get update && apt-get install -y \
#         libpng-dev \
#         libjpeg-dev \
#         libfreetype6-dev \
#         libzip-dev \
#         && docker-php-ext-configure gd \
#             --with-freetype \
#             --with-jpeg \
#         && docker-php-ext-install gd \
#         && docker-php-ext-install mysqli
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable pdo_mysql
# Expose port 80 to access the web server
EXPOSE 80
# Apache will automatically start

