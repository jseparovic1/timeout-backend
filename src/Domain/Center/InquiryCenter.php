<?php

declare(strict_types=1);

namespace Timeout\Domain\Center;

use Timeout\Domain\Sport\Sport;

class InquiryCenter
{
    /** @var InquiriesRepository */
    private $inquiriesRepository;

    public function __construct(InquiriesRepository $inquiriesRepository)
    {
        $this->inquiriesRepository = $inquiriesRepository;
    }

    public function submit(InquirySender $sender, string $message, Center $center, Sport $sport): Inquiry
    {
       $inquiry = new Inquiry(
           $sender,
           $message,
           $center,
           $sport
       );

       //@TODO Send inquiry to someone ... ??

       $this->inquiriesRepository->save($inquiry);

       return $inquiry;
    }
}
