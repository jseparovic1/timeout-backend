<?php

namespace Timeout\App\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class CreateLogInAction extends AbstractController
{
    /** @var AuthenticationUtils */
    private $authentication;

    public function __construct(AuthenticationUtils $authenticationUtil)
    {
        $this->authentication = $authenticationUtil;
    }

    /**
     * @Route("/login", name="app_login")
     */
    public function __invoke(): Response
    {
        $error = $this->authentication->getLastAuthenticationError();
        $lastUsername = $this->authentication->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }
}
