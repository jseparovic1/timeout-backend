<?php

declare(strict_types=1);

namespace Timeout\Framework\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;
use Faker\Generator as FakerGenerator;

abstract class FakerFixture extends Fixture
{
    /** @var FakerGenerator */
    protected $faker;

    public function __construct()
    {
        $this->faker = Factory::create('hr_HR');;
    }
}
