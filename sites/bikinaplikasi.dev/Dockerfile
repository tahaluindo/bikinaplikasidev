####
FROM php:7.4-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
EXPOSE 8000
ENTRYPOINT [ "php /usr/src/myapp/artisan serve"]
######