COMPOSE_FILE_ARGS ?= -f docker-compose.yml

DOCKER_COMPOSE = docker-compose $(COMPOSE_FILE_ARGS)

up:
	$(DOCKER_COMPOSE) up -d --build --remove-orphans

down:
	$(DOCKER_COMPOSE) down --remove-orphans

logs:
	$(DOCKER_COMPOSE) logs -f

logs-dev:
	$(DOCKER_COMPOSE) exec php tail -f var/log/dev.log

recreate:
	$(DOCKER_COMPOSE) up -d --build --force-recreate --remove-orphans

stop:
	$(DOCKER_COMPOSE) stop

restart:
	$(DOCKER_COMPOSE) restart

ps:
	$(DOCKER_COMPOSE) ps

tests:
	docker-compose -f docker-compose.test.yml down
	docker-compose -f docker-compose.test.yml build
	docker-compose -f docker-compose.test.yml run php

shell:
	$(DOCKER_COMPOSE) exec php ash

.PHONY: tests
.DEFAULT: up