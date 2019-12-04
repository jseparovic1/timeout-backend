<?php

declare(strict_types=1);


namespace Timeout\App\Admin;

use RuntimeException;
use Symfony\Component\Routing\Annotation\Route;

class CreateLogOutAction
{
    /**
     * @Route("/logout", name="app_logout")
     */
    public function __invoke()
    {
        throw new RuntimeException('We should never hit this route. Logout is handled by firewall.');
    }
}
