<?php

declare(strict_types=1);

namespace App\Action;

use App\Repository\SportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListSportsAction extends Controller
{
    /** @var SportRepository */
    private $sportRepository;

    public function __construct(SportRepository $sportRepository)
    {
        $this->sportRepository = $sportRepository;
    }

    /**
     * @Route("/sports", name="api.sports.show", methods={"GET"})
     */
    public function __invoke(): Response
    {
        return new JsonResponse(
            $this->sportRepository->findAll()
        );
    }
}
