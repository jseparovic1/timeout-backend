<?php

namespace App\Command;

use App\Entity\Address;
use App\Entity\Center;
use App\Entity\Court;
use App\Entity\Sport;
use App\Repository\SportsRepository;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TimeoutInstall extends Command
{
    /** @var SportsRepository */
    private $sportRepository;

    public function __construct(SportsRepository $sportRepository)
    {
        parent::__construct();

        $this->sportRepository = $sportRepository;
    }

    public function configure()
    {
        $this->setName('timeout:install');
        $this->setDescription('Install timeout application.');
    }

    function exec(InputInterface $input, OutputInterface $io): void
    {
        $sports = [];

        $sports[] = new Sport(1, 'Cageball', 'cage-ball');
        $sports[] = new Sport(2, 'Tenis', 'tenis');
        $sports[] = new Sport(3, 'Stolni tenis', 'stolni-tenis');
        $sports[] = new Sport(4, 'Košarka', 'kosarka');
        $sports[] = new Sport(5, 'Nogomet', 'nogomet');

        foreach ($sports as $sport) {
            $io->writeln(sprintf('Adding sport %s', $sport->getName()));

            $this->sportRepository->save($sport);
        }

        $center = new Center(
            1,
            'Sportski centar Liotic',
            'Sportski centar Liotic',
            'Sportski centar Liotic',
            'Sportski centar Liotic',
            new Address(
                'street',
                'city',
                'lat',
                'long'
            ),
            'sportski-centar-lipotic'
        );

        $center->addCourt(
            new Court(
                1,
                'Vanjski teren cage',
                '150-240kn',
                [
                    'https://timeout.com/tereni/lipotic/1.jpeg'
                ],
                $center
            )
        );
    }
}
