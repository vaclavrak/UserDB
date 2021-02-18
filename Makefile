# Makefile for Docker Nginx PHP Composer MySQL
#

include .env

# MySQL

MYSQL_DUMPS_DIR := db
PHP_TAG := $(shell git log -1 --format=%h)


help:
	@echo ""
	@echo "usage: make COMMAND"
	@echo ""
	@echo "Commands:"
	@echo "  mysql-restore       Restore backup of all databases"
	@echo "  build-php           Build PHP image"
	@echo "  restart-app         Full restart docker-compose and reinit DB"


mysql-restore:
	@docker exec -i $(shell docker-compose ps -q php) php www/index.php migrations:continue --production
	@docker exec -i $(shell docker-compose ps -q db) mysql -u"$(MYSQL_ROOT_USER)" -p"$(MYSQL_ROOT_PASSWORD)" $(MYSQL_DATABASE) < $(MYSQL_DUMPS_DIR)/dummy-data/2016-10-23-211747-new-init-dummy-data.sql
	@docker exec -i $(shell docker-compose ps -q db) mysql -u"$(MYSQL_ROOT_USER)" -p"$(MYSQL_ROOT_PASSWORD)" $(MYSQL_DATABASE) < $(MYSQL_DUMPS_DIR)/dummy-data/2016-10-24-135743-api-klice.sql 2>/dev/null


build-php:
	@docker build -f Dockerfile.php . -t userdb_php:$(shell git log -1 --format=%h)

restart-app:
	@echo "PHP_TAG=${PHP_TAG}" > ${PHP_TAG}.env
	@cat .env >> ${PHP_TAG}.env
	$(MAKE) build-php
	@docker-compose stop
	@docker-compose rm -f	
	@docker-compose --env-file ${PHP_TAG}.env up -d
	@sleep 20
	$(MAKE) mysql-restore
	@docker-compose logs -f

