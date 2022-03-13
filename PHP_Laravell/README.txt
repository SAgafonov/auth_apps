Примеры отсюда:
https://itproger.com/course/laravel
https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-20-04-ru

Запускать с нуля (из папки с проектом):
- sudo docker-compose build app
- sudo docker-compose up (docker-compose up -d -> в фоне)
Запустится на localhost:8000
- Зайти в контейнер
sudo docker-compose exec app /bin/bash
- Запустить миграцию 
php artisan migrate

Остановить контейнеры:
- docker-compose down


HowTo:
По умолчанию роль будет устанавливаться user. Но ее можно поменять на admin при реге - скрытое поле 'role'.
