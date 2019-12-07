<?php

declare(strict_types=1);

chdir(dirname(__DIR__));

//system('touch .env');
echo 'Dumping env variables.' . PHP_EOL;
system('composer dump-env prod');

echo 'Export prod.' . PHP_EOL;
system('export APP_ENV=prod');

echo 'Clear cache.' . PHP_EOL;
system('php bin/console cache:clear');

echo 'Assets install.' . PHP_EOL;
system('php bin/console assets:install');

echo 'Configuring database.' . PHP_EOL;
system('php bin/console doctrine:database:create --if-not-exists');
system('php bin/console doctrine:schema:update --force');
system('php bin/console doctrine:fixtures:load -n');
