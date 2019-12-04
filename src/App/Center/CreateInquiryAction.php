<?php

declare(strict_types=1);

namespace Timeout\App\Center;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Timeout\Domain\Center\Center;
use Timeout\Domain\Center\InquiryCenter;
use Timeout\Domain\Sport\SportNotFound;
use Timeout\Domain\Sport\SportsRepository;

class CreateInquiryAction extends AbstractController
{
    /** @var SportsRepository */
    private $sportsRepository;

    /** @var InquiryCenter */
    private $inquiry;

    public function __construct(SportsRepository $sportsRepository, InquiryCenter $inquiry)
    {
        $this->sportsRepository = $sportsRepository;
        $this->inquiry = $inquiry;
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

        $inquiry = $this->inquiry->submit(
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
