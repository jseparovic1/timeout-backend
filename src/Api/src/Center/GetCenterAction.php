<?php

declare(strict_types=1);

namespace App\Api\Center;

use App\Timeout\Center\CenterNotFound;
use App\Timeout\Center\CentersRepository;
use App\Timeout\Sport\SportsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;
use Symfony\Component\HttpFoundation\Response;
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
            throw CenterNotFound::forSlug($centerSlug);
        }

        $sports = $this->sportsRepository->findByCenter($center);

        return $this->json(new CenterResponse($center, $sports));
    }
}
