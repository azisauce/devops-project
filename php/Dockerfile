FROM php:8.1-fpm

WORKDIR /var/www

# Install system dependencies
RUN apt-get update -y
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev zlib1g-dev libxml2-dev libzip-dev libonig-dev graphviz 
RUN apt-get install -y --no-install-recommends \
	git \
	libz-dev \
	libpq-dev \
	libxml2-dev \
	libmemcached-dev \
	libldap2-dev libbz2-dev \
	zlib1g-dev libicu-dev g++ \
	libssl-dev libssl-doc libsasl2-dev \
	curl libcurl4-openssl-dev



RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
    # Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install exif 
RUN docker-php-ext-install pcntl 
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY ./application/ .
