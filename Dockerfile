FROM php:7.3-fpm
RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    zip \
    unzip \
    ldap-utils \
    libldap2-dev \
    curl \
    libpng-dev

RUN apt-get update && \
    apt-get install -y libxml2-dev
RUN docker-php-ext-install soap

#upload
RUN echo "file_uploads = On\n" \
         "memory_limit = 500M\n" \
         "upload_max_filesize = 500M\n" \
         "post_max_size = 500M\n" \
         "max_execution_time = 6000\n" \
         > /usr/local/etc/php/conf.d/uploads.ini


RUN docker-php-ext-install pdo_mysql zip ldap exif bcmath
RUN docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-configure bcmath --enable-bcmath
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install gd

RUN curl --silent --show-error https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer
