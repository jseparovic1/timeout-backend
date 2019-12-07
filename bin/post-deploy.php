<?php

declare(strict_types=1);

chdir(dirname(__DIR__));

system('composer dump-env prod');
system('php bin/console cache:clear');
system('composer timeout:install');
