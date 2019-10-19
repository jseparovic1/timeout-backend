<?php

declare(strict_types=1);

namespace App\Action;

use App\Repository\CentersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class GetCenterAction extends Controller
{
    /** @var CentersRepository */
    private $centersRepository;

    public function __construct(CentersRepository $centersRepository)
    {
        $this->centersRepository = $centersRepository;
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

        return $this->json($center);
    }
}
