<?php

declare(strict_types=1);

chdir(dirname(__DIR__));

system('touch .env');
system('chmod 755 bin/console');
system('composer dump-env prod');
system('php bin/console cache:clear');
system('composer timeout:install');
