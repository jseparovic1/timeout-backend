<?php

declare(strict_types=1);

namespace App\Action;

use App\Repository\CentersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListCentersAction extends Controller
{
    /** @var CentersRepository */
    private $centersRepository;

    public function __construct(CentersRepository $centersRepository)
    {
        $this->centersRepository = $centersRepository;
    }

    /**
     * @Route("/centers", name="api.centers.list", methods={"GET"})
     */
    public function __invoke(): Response
    {
        return $this->json(
            $this->centersRepository->findAll()
        );
    }
}
