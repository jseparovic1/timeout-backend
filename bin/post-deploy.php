<?php

declare(strict_types=1);

chdir(dirname(__DIR__));

system('touch .env');
system('chmod 777 bin/console');
system('composer dump-env prod');
system('php bin/console cache:clear');
//system('composer timeout:install');

system('php bin/console doctrine:database:create --if-not-exists');
system('php bin/console doctrine:schema:update --force');
system('php bin/console doctrine:fixtures:load -n');
