####################
# Run from web root:
# $ make
####################
# Name our phony targets
.PHONY: all dev review staging production

# Default
all: default
dev: permissions env-dev refresh clear done
review: permissions env-review refresh clear done
staging: permissions refresh clear done
production: permissions migrate clear optimize done

default:
	@echo Please supply an environment argument (dev, review, staging or production)

permissions:
	@echo -n Changing permissions...
	@chmod 777 ./bootstrap/cache
	@chmod 777 ./public/content
	@chmod 777 ./tmp
	@chmod 777 ./vendor
	@find ./storage -type d -print0 | xargs -0 chmod 777
	@echo Done

refresh:
	@echo -n Migrate refresh and seed...
	@php artisan migrate:refresh --seed
	@echo Done

clear:
	@echo -n Clearing cache...
	@php artisan cache:clear --quiet
	@echo Done

optimize:
	@echo -n Optimizing...
	@php artisan config:cache --quiet
	@php artisan route:cache --quiet
	@echo Done

migrate:
	@echo -n New migrations...
	@php artisan migrate
	@echo Done

vendors:
	@echo -n Installing dependencies...
	@composer install
	@echo Done

	@echo -n npm install...
	@npm install &> /dev/null
	@echo DONE

	@echo -n bower install...
	@bower install
	@echo DONE

env-dev:
	@echo -n Creating env file...
	@cp stubs/.env.dev .env
	@chmod 0744 .env
	@php artisan key:generate --quiet
	@echo Done

env-review:
	@echo -n Creating env file...
	@cp stubs/.env.review .env
	@chmod 0744 .env
	@php artisan key:generate --quiet
	@echo Done

done:
	@echo Ready to go!
