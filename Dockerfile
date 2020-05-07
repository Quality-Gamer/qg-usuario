FROM laradock/workspace:latest
LABEL Iago Agualuza
COPY . /app
WORKDIR /app
ENTRYPOINT php artisan key:generate && php artisan migrate && php artisan db:seed && php artisan serve
EXPOSE 3000
