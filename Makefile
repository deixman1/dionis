DOCKER_CMD=sudo docker-compose -f ./docker/docker-compose.yml
php-console:
	$(DOCKER_CMD) exec php bash
up:
	$(DOCKER_CMD) up
start:
	$(DOCKER_CMD) start
stop:
	$(DOCKER_CMD) stop
down:
	$(DOCKER_CMD) down
rm:
	$(DOCKER_CMD) rm
build:
	$(DOCKER_CMD) up -d --force-recreate --build
composer-install:
	$(DOCKER_CMD) exec php composer install
composer-update:
	$(DOCKER_CMD) exec php composer update
init: build composer-install