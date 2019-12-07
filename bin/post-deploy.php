<?php

declare(strict_types=1);

chdir(dirname(__DIR__));

echo 'Dirty hack to support native .env variables.' . PHP_EOL;
system('echo "<?php return [];" > .env.local.php');

echo 'Clear cache.' . PHP_EOL;
system('php bin/console cache:clear');

echo 'Assets install.' . PHP_EOL;
system('php bin/console assets:install');

echo 'Configuring database.' . PHP_EOL;
system('php bin/console doctrine:database:create --if-not-exists');
system('php bin/console doctrine:schema:update --force');
system('php bin/console doctrine:fixtures:load -n');
