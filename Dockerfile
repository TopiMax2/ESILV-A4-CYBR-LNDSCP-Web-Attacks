# Use an official PHP runtime as a parent image
FROM php:7.4-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install any needed packages
RUN apt-get update \
    && apt-get install -y vim \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite

# Make port 80 available to the world outside this container
EXPOSE 80

# Run apache when the container launches
CMD ["apache2-foreground"]
