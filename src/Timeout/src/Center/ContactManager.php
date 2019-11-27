<?php

declare(strict_types=1);

namespace App\Timeout\Center;

use App\Timeout\Sport\Sport;

class ContactManager
{
    /** @var InquiriesRepository */
    private $inquiriesRepository;

    public function __construct(InquiriesRepository $inquiriesRepository)
    {
        $this->inquiriesRepository = $inquiriesRepository;
    }

    public function submitInquiry(Contact $sender, string $message, Center $center, Sport $sport)
    {
       $inquiry = new Inquiry(
           $sender,
           $message,
           $center,
           $sport
       );

       //@TODO Send inquiry to someone ... ??

       $this->inquiriesRepository->save($inquiry);
    }
}
