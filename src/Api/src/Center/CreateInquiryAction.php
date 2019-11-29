<?php

declare(strict_types=1);

namespace App\Api\Center;

use App\Timeout\Center\Center;
use App\Timeout\Center\ContactManager;
use App\Timeout\Sport\SportNotFound;
use App\Timeout\Sport\SportsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateInquiryAction extends AbstractController
{
    /** @var SportsRepository */
    private $sportsRepository;

    /** @var ContactManager */
    private $manager;

    public function __construct(SportsRepository $sportsRepository, ContactManager $manager)
    {
        $this->sportsRepository = $sportsRepository;
        $this->manager = $manager;
    }

    /**
     * @Route("/centers/{slug}/inquiry", name="api.center_inquiry.create", methods={"POST"})
     */
    public function __invoke(Center $center, CreateCenterInquiryRequest $inquiryRequest): Response
    {
        $sport = $this->sportsRepository->find($inquiryRequest->getSport());

        if ($sport === null) {
            throw SportNotFound::for($inquiryRequest->getSport());
        }

        $inquiry = $this->manager->submitInquiry(
            $inquiryRequest->getContact(),
            $inquiryRequest->getMessage(),
            $center,
            $sport,
        );

        return $this->json(
            [
                'id' => $inquiry->getId(),
                'sender' => $inquiry->getSender(),
                'message' => $inquiry->getMessage(),
                'sport' => $inquiry->getSport(),
            ],
            Response::HTTP_CREATED
        );
    }
}
