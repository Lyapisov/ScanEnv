.DEFAULT_GOAL := helpphp

help:
	@grep -E '^[a-zA-Z-]+:.*?## .*$$' Makefile | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "[32m%-17s[0m %s\n", $$1, $$2}'
.PHONY: help

connect-php: ## Connect php
	docker-compose exec backend-php-cli bash

run-tests: ## Runs phpunit
	docker-compose run --rm backend-php-cli vendor\bin\phpunit

initialize-locally: ## Initialize project locally
	docker-compose pull
	docker-compose up --build -d
	docker-compose run --rm backend-php-cli composer install

