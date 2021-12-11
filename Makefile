docker-up:
	docker-compose up -d

docker-down:
	docker-compose down

docker-build:
	docker-compose up --build -d

test:
	docker-compose exec php-cli vendor/bin/phpunit --colors=always

migrate:
	docker-compose exec php-cli artisan migrate

run:
	docker-compose exec php-cli $(cmd)

perm:
	sudo chown ${USER}:${USER} . -R
	chmod -R 777 storage

assets-install:
	docker-compose exec node yarn install

assets-dev:
	docker-compose exec node yarn run dev

assets-prod:
	docker-compose exec node yarn run prod

assets-watch:
	docker-compose exec node yarn run watch
