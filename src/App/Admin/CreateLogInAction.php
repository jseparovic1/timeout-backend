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

        return $this->render('@EasyAdmin/page/login.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername,
            'csrf_token_intention' => 'authenticate',
            'username_label' => 'Vaša email adresa',
            'password_label' => 'Lozinka',
            'sign_in_label' => 'Prijava',
        ]);
    }
}
