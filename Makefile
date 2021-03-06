it: cs test

composer:
	composer validate
	composer install

cs: composer
	vendor/bin/php-cs-fixer fix --config=.php_cs --verbose --diff

test: composer
	vendor/bin/phpunit
