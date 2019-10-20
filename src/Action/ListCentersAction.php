<?php

declare(strict_types=1);

namespace App\Action;

use App\Repository\CentersRepository;
use App\Repository\SportsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListCentersAction extends Controller
{
    /** @var CentersRepository */
    private $centersRepository;

    /** @var SportsRepository */
    private $sportsRepository;

    public function __construct(CentersRepository $centersRepository, SportsRepository $sportsRepository)
    {
        $this->centersRepository = $centersRepository;
        $this->sportsRepository = $sportsRepository;
    }

    /**
     * @Route("/centers", name="api.centers.list", methods={"GET"})
     */
    public function __invoke(Request $request): Response
    {
        return $this->json(
            $this->centersRepository->findAll($request->query->get('sport'))
        );
    }
}
