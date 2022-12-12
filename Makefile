install:
	composer install

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

test:
	composer phpunit tests

test-coverage:
	composer phpunit tests -- --coverage-clover build/logs/clover.xml