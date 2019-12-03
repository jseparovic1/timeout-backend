<?php

namespace Timeout\App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Timeout\Domain\Center\Address;
use Timeout\Domain\Center\Center;
use Timeout\Domain\Center\Coordinate;
use Timeout\Domain\Center\Court;
use Timeout\Domain\Center\Facility;
use Timeout\Domain\Center\WorkingHours;
use Timeout\Framework\DataFixtures\FakerFixture;

class CenterFixtures extends FakerFixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $courtsCount = 0;

        foreach (range(1, 5) as $centers) {
            $centerName = ($this->faker->firstNameFemale);
            $center = new Center(
                sprintf('Sportski centar %s', $centerName),
                sprintf('sportski-centar-%s', mb_strtolower($centerName)),
                $this->faker->paragraph(10, true),
                $this->faker->companyEmail,
                $this->faker->phoneNumber,
                new Address(
                    $this->faker->streetAddress,
                    $this->faker->city,
                    new Coordinate(
                        '43.522835',
                        '16.469226'
                    )
                ),
                $this->getOpeningHours(),
                [
                    new Facility('wifi', '/icons/facilities/wifi.svg'),
                    new Facility('tus', '/icons/facilities/shower.svg'),
                    new Facility('food', '/icons/facilities/food.svg'),
                    new Facility('parking', '/icons/facilities/parking.svg'),
                    new Facility('beer', '/icons/facilities/beer.svg'),
                ]
            );

            // For each center take 2 court fixtures.
            foreach (range(1, 2) as $numberOfCourts) {
                /** @var Court $court */
                $court = $this->getReference(sprintf('courts_%d', $courtsCount));

                $center->addCourt($court);

                $courtsCount++;
            }

            $manager->persist($center);
            $manager->flush();
        }
    }

    /**
     * @return WorkingHours[]
     */
    public function getOpeningHours(): array
    {
        return [
            new WorkingHours(1, '09:00', '23:00'),
            new WorkingHours(2, '09:00', '23:00'),
            new WorkingHours(3, '09:00', '23:00'),
            new WorkingHours(4, '09:00', '23:00'),
            new WorkingHours(5, '09:00', '23:00'),
            new WorkingHours(6, '09:00', '23:00'),
            new WorkingHours(7, '09:00', '23:00'),
        ];
    }

    /**
     * @return Fixture[]
     */
    public function getDependencies(): array
    {
        return [
            CourtFixture::class
        ];
    }
}
