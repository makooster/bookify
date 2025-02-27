FROM composer:latest

WORKDIR /var/www/bookify

ENTRYPOINT ["composer", "--ignore-platform-reqs"]