# Cyber Konsultant

## Documentation

* https://symfony.com/doc/current/index.html

## Requirements

* PHP 8.0
* PostgreSQL 12

## Installation

### Setup database

- `bin/console doctrine:database:create --if-not-exists` - create database
- `bin/console doctrine:migrations:migrate -n` - migrate database
- `bin/console hautelook:fixtures:load -n` - load fixtures

### Run server

- `symfony serve`

## UI

https://symfony.com/doc/current/frontend.html

- `yarn install`
- `yarn encore dev`

## Commands

- `composer cs-fix` - fix coding style
- `composer phpunit` - run phpunit tests
- `make tests` - run phpunit tests in docker
- `make up` - start docker compose
- `make stop` - stop docker compose
- `make restart` - restart docker compose
- `make shell` - access docker php shell
