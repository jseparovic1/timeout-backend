<?php

declare(strict_types=1);

chdir(dirname(__DIR__));

//system('touch .env');
system('composer dump-env prod');
system('export APP_ENV=prod');
system('composer update');
system('php bin/console cache:clear');
system('php bin/console assets:install');
system('php bin/console doctrine:database:create --if-not-exists');
system('php bin/console doctrine:schema:update --force');
system('php bin/console doctrine:fixtures:load -n');
