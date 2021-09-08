# Cyber Konsultant

## Requirements

* PHP 8.0
* PostgreSQL 12
* Docker or Nginx or Apache 2

## 1. Installation with Docker

### 1.1 Install docker and docker compose

- Install Docker on your system https://docs.docker.com/get-docker/
- Install Docker Compose https://docs.docker.com/compose/install/

### 1.2 Run docker compose

- `docker compose up -d --build --remove-orphans` or `make up`

### 1.3 Install composer dependencies

- `docker compose exec composer install` or `make composer-install` - install composer dependencies

### 1.4 Setup database schema and fixtures

- `docker compose exec php composer db-setup` or `make db-setup` - create database, run migrations and fixtures

### 1.5 UI dependencies and webpack

- `docker compose exec php yarn install` or `make yarn-install` - install frontend dependencies
- `docker compose exec php yarn encore dev` or `make yarn-encore-dev` - compile frontend dev

More info https://symfony.com/doc/current/frontend.html

### 1.6 Open in the browser

- http://localhost - open website

### 1.7 Fix Coding standards

- `docker compose exec php composer cs-fix` or `make cs-fix` - create database, run migrations and fixtures

### 1.8 PHP Unit tests

- `docker compose exec php composer phpunit` or `make phpunit` - run phpunit tests

### 1.9 Async queue

All heavy tasks should be run in the background (ie. generate pdf, sending emails etc.)
Read more at https://symfony.com/doc/current/messenger.html

In the docker environment queue is already running with the supervisor see file: `docker-files/etc/supervisord.conf`
When you made any change in the code the queue must be restarted, because this is long running process.
To restart queue the best is restart or recreate docker container `docker compose up -d --build --force-recreate` or `make recreate`

- `docker compose exec php bin/console messenger:consume --help` - display help

Read more at https://symfony.com/doc/current/messenger.html#deploying-to-production

### 1.10 Useful commands

- `docker compose exec php bin/console` list all available commands
- `docker compose exec php bin/console cache:clear` or `make php-shell` - access docker php shell
- `docker compose logs -f` or `make logs` - display docker logs
- `docker compose exec php tail -f var/log/dev.log` or `make logs-dev` - display symfony dev logs
- `docker compose up -d --build --force-recreate --remove-orphans` or `make recreate` - recreate and restart docker containers
- `docker compose stop` or `make stop` - stop docker containers
- `docker compose down` or `make down` - stop and remove docker containers
- `docker compose restart` or `make restart` - restart docker containers
- `docker compose exec php ash` or `make php-shell` - access docker php shell

## 2. Installation on local system

### 2.1 Install PHP 8.0

- https://www.php.net/downloads.php

### 2.2 Install PostgreSQL 12

- https://www.postgresql.org/download/

### 2.3 Setup Nginx or Apache vhost or Symfony built-in server

You can use nginx or apache web server or use symfony built-in server.

- https://symfony.com/doc/current/setup/web_server_configuration.html
- https://symfony.com/doc/current/setup/symfony_server.html

### 2.4 Configuration

Default configuration file `.env` is already prepared to work with docker compose, you need to override configuration

- copy `.env` to `.env.local` and edit database connection settings `DATABASE_URL=`
- copy `.env.test` to `.env.test.local` and edit database connection settings `DATABASE_URL=`

More info https://symfony.com/doc/current/configuration.html#configuring-environment-variables-in-env-files

### 2.5 Install composer dependencies

- `composer install` - install composer dependencies

### 2.6 Setup database schema and fixtures

- `composer db-setup` - create database, run migrations and fixtures

### 2.7 UI dependencies and webpack

- `yarn install` - install frontend dependencies
- `yarn encore dev` - compile frontend dev

More info https://symfony.com/doc/current/frontend.html

### 2.8 Finish

- http://localhost - open website (depends on used local web server)

### 2.9 Fix Coding standards

- `composer cs-fix` or `make cs-fix` - create database, run migrations and fixtures

### 2.10 PHP Unit tests

- `composer phpunit` - run phpunit tests

### 2.11 Async queue

All heavy tasks should be run in the background (ie. generate pdf, sending emails etc.)
Read more at https://symfony.com/doc/current/messenger.html

Run messenger queue

- `bin/console messenger:consume async --limit=25 --memory-limit=128M --time-limit=3600` - run queue with limits
- `php bin/console messenger:consume --help` - display help

## 3. Admin panel

- http://localhost/admin/auth

Login and passwords you will find in the fixtures `fixtures/administrators.yml` (for example email `everett.hess@example.com` password: `SecretPassword123!`)

## 4. Client panel

- http://localhost/account/auth

Login and passwords you will find in the fixtures `fixtures/users.yml` (for example email `joseph.dyke@example.com` password: `SecretPassword123!`)

## 5. Documentation

- https://symfony.com/doc/current/index.html
- https://symfony.com/doc/current/frontend.html
- https://symfony.com/doc/current/configuration.html#configuring-environment-variables-in-env-files
- https://symfony.com/doc/current/setup/web_server_configuration.html
- https://symfony.com/doc/current/setup/symfony_server.html
- https://symfony.com/doc/current/messenger.html
- https://github.com/KnpLabs/KnpGaufretteBundle
- https://github.com/KnpLabs/KnpPaginatorBundle
- https://github.com/hautelook/AliceBundle
- https://mpdf.github.io/
- https://github.com/doctrine-extensions/DoctrineExtensions
