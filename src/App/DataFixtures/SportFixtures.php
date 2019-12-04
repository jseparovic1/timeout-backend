<?php

declare(strict_types=1);

namespace Timeout\App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;
use Timeout\Domain\Sport\Sport;

class SportFixtures extends Fixture
{
    public const SPORT_CAGE = 'cage-ball';
    public const SPORT_TENNIS = 'tenis';
    public const SPORT_TABLE_TENNIS = 'stolni-tenis';
    public const SPORT_BASKETBALL = 'kosarka';
    public const SPORT_GOLF = 'golf';
    public const SPORT_BOWLING = 'kuglanje';
    public const SPORT_BILLARD = 'biljar';
    public const SPORT_FOOTBALL = 'nogomet';
    public const SPORT_BADMINTON = 'badminton';

    public const SPORTS = [
        self::SPORT_FOOTBALL,
        self::SPORT_CAGE,
        self::SPORT_TENNIS,
        self::SPORT_TABLE_TENNIS,
        self::SPORT_BASKETBALL,
        self::SPORT_GOLF,
        self::SPORT_BOWLING,
        self::SPORT_BILLARD,
        self::SPORT_FOOTBALL,
        self::SPORT_BADMINTON,
    ];

    public function load(ObjectManager $manager): void
    {
        $sports = new ArrayCollection(
            [
                new Sport(1, 'Cageball', '/icons/sports/cage-ball.svg', 'cage-ball'),
                new Sport(2, 'Tenis', '/icons/sports/tennis.svg', 'tenis'),
                new Sport(3, 'Stolni tenis', '/icons/sports/table-tennis.svg', 'stolni-tenis'),
                new Sport(4, 'Košarka', '/icons/sports/basketball.svg', 'kosarka'),
                new Sport(5, 'Nogomet', '/icons/sports/football.svg', 'nogomet'),
                new Sport(6, 'Golf', '/icons/sports/golf.svg', 'golf'),
                new Sport(7, 'Kuglanje', '/icons/sports/bowling.svg', 'kuglanje'),
                new Sport(8, 'Biljar', '/icons/sports/billard.svg', 'biljar'),
                new Sport(9, 'Badminton', '/icons/sports/badminton.svg', 'badminton'),
            ]
        );

        /** @var Sport $sport */
        foreach ($sports as $sport) {
            $this->addReference($sport->getSlug(), $sport);

            $manager->persist($sport);
            $manager->flush();
        }
    }
}
