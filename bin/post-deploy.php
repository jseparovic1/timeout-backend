<?php

declare(strict_types=1);

system('composer dump-env prod');
system('composer timeout:install');
