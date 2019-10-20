<?php

declare(strict_types=1);

namespace App\Action;

use App\Repository\CentersRepository;
use App\Repository\SportsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class GetCenterAction extends Controller
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
     * @Route("/centers/{centerSlug}", name="api.centers.get", methods={"GET"})
     */
    public function __invoke(string $centerSlug): Response
    {
        $center = $this->centersRepository->findOneBy([
            'slug' => $centerSlug
        ]);

        if ($center === null) {
            throw new NotFoundHttpException(
                sprintf('Center with id %s does not exists.')
            );
        }

        $sports = $this->sportsRepository->findByCenter($center);

        return $this->json([
                'center' => $center,
                'sports' => $sports
            ]
        );
    }
}
