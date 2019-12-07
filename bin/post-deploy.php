<?php

declare(strict_types=1);

chdir(dirname(__DIR__));

system('touch .env');
system('chmod 777 bin/console');
system('composer dump-env prod');
system('bin/console cache:clear');
//system('composer timeout:install');

system('bin/console doctrine:database:create --if-not-exists');
system('bin/console doctrine:schema:update --force');
system('bin/console doctrine:fixtures:load -n');
