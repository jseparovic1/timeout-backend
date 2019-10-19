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
            'Sportski centar Lipotic',
            'Sportski centar Lipotic description',
            'pero@lipotic.com',
            '+385 91 897 2122',
            new Address(
                'Put Petra',
                'Kaštela',
                '43.522835',
                '16.469226'
            ),
            'sportski-centar-lipotic'
        );

        $center->addCourt(
            new Court(
                1,
                'Vanjski teren cage',
                '150-240kn',
                [
                    'https://epodravina.hr/wp-content/uploads/2019/01/11-1-640x480.jpg',
                    'https://fitnesscentarjoker.hr/wp-content/uploads/2017/05/cageball.jpg',
                    'https://www.glaspodravine.hr/wp-content/uploads/2019/01/1Q7A2279-750x500.jpg'
                ],
                $center
            )
        );

        $center->addCourt(
            new Court(
                2,
                'Unutarnji cage',
                '160-250kn',
                [
                    'https://epodravina.hr/wp-content/uploads/2019/01/11-1-640x480.jpg',
                    'https://fitnesscentarjoker.hr/wp-content/uploads/2017/05/cageball.jpg',
                ],
                $center
            )
        );
    }
}
