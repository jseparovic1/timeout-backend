<?php

declare(strict_types=1);

system('composer dump-env prod');
system('php bin/console.php do:sc:up --force');
