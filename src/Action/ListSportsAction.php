<?php

declare(strict_types=1);

namespace App\Action;

use App\Repository\SportsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListSportsAction extends Controller
{
    /** @var SportsRepository */
    private $sportRepository;

    public function __construct(SportsRepository $sportRepository)
    {
        $this->sportRepository = $sportRepository;
    }

    /**
     * @Route("/sports", name="api.sports.list", methods={"GET"})
     */
    public function __invoke(): Response
    {
        return $this->json(
            $this->sportRepository->findAll()
        );
    }
}
