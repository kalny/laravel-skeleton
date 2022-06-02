docker-up:
	docker-compose up -d --remove-orphans

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
	chmod -R 777 bootstrap/cache
	chmod -R 777 .env

assets-install:
	docker-compose exec node yarn install

assets-dev:
	docker-compose exec node yarn run dev

assets-prod:
	docker-compose exec node yarn run prod

assets-watch:
	docker-compose exec node yarn run watch

npm-install:
	docker-compose exec node npm install

npm-run-dev:
	docker-compose exec node npm run dev

npm-run-prod:
	docker-compose exec node npm run prod
