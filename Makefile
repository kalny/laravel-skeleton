docker-up:
	docker-compose up -d

docker-down:
	docker-compose down

docker-build:
	docker-compose up --build -d

test:
	docker exec foxwood_php-cli_1 vendor/bin/phpunit --colors=always

migrate:
	docker exec foxwood_php-cli_1 php artisan migrate

run:
	docker exec foxwood_php-cli_1 $(cmd)

perm:
	sudo chown ${USER}:${USER} . -R
	chmod -R 777 storage

assets-install:
	docker exec foxwood_node_1 yarn install

assets-dev:
	docker exec foxwood_node_1 yarn run dev

assets-prod:
	docker exec foxwood_node_1 yarn run prod

assets-watch:
	docker exec foxwood_node_1 yarn run watch
