<?php

declare(strict_types=1);

namespace Timeout\App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Timeout\Domain\Center\Court;
use Timeout\Domain\Sport\Sport;
use Timeout\Framework\DataFixtures\FakerFixture;

class CourtFixture extends FakerFixture implements DependentFixtureInterface
{
    public function create(?int $id = null): Court
    {
        $sport = SportFixtures::SPORTS[array_rand(SportFixtures::SPORTS)];

        /** @var Sport $sport */
        $sport = $this->getReference($sport);

        return new Court(
            sprintf('%s %d %s', $this->faker->word, $id ?? '', $sport->getName()),
            sprintf(
                '%d - %d kn',
                $this->faker->numberBetween(100, 120),
                $this->faker->numberBetween(140, 200)
            ),
            $this->faker->sentence,
            $sport,
            [
                $this->faker->imageUrl('1920','1080', 'sports'),
                $this->faker->imageUrl('1920','1080', 'sports'),
                $this->faker->imageUrl('1920','1080', 'sports'),
                $this->faker->imageUrl('1920','1080', 'sports'),
            ],
        );
    }

    public function load(ObjectManager $manager)
    {
        foreach (range(0, 10) as $courtsNumber) {
            $sport = SportFixtures::SPORTS[array_rand(SportFixtures::SPORTS)];

            /** @var Sport $sport */
            $sport = $this->getReference($sport);

            $court = new Court(
                sprintf('Teren %s', $sport->getName()),
                sprintf(
                    '%d - %d kn',
                    $this->faker->numberBetween(100, 120),
                    $this->faker->numberBetween(140, 200)
                ),
                $this->faker->sentence,
                $sport,
                [
                    $this->faker->imageUrl('1920','1080', 'sports'),
                    $this->faker->imageUrl('1920','1080', 'sports'),
                    $this->faker->imageUrl('1920','1080', 'sports'),
                    $this->faker->imageUrl('1920','1080', 'sports'),
                ],
            );

            $this->addReference(sprintf('courts_%d', $courtsNumber), $court);

            $manager->persist($court);
            $manager->flush();
        }
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            SportFixtures::class
        ];
    }
}
