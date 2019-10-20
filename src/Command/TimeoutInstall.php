<?php

namespace App\Command;

use App\Entity\Address;
use App\Entity\Center;
use App\Entity\Coordinate;
use App\Entity\Court;
use App\Entity\Sport;
use App\Entity\WorkingHours;
use App\Repository\CentersRepository;
use App\Repository\SportsRepository;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TimeoutInstall extends Command
{
    /** @var SportsRepository */
    private $sportRepository;

    /** @var CentersRepository */
    private $centersRepository;

    public function __construct(SportsRepository $sportRepository, CentersRepository $centersRepository)
    {
        parent::__construct();

        $this->sportRepository = $sportRepository;
        $this->centersRepository = $centersRepository;
    }

    public function configure()
    {
        $this->setName('timeout:install');
        $this->setDescription('Install timeout application.');
    }

    function exec(InputInterface $input, OutputInterface $io): void
    {
        $sports = [];

        $sports[] = new Sport(1, 'Cageball', '/icons/sports/cage-ball.svg', 'cage-ball');
        $sports[] = new Sport(2, 'Tenis', '/icons/sports/tennis.svg', 'tenis');
        $sports[] = new Sport(3, 'Stolni tenis', '/icons/sports/table-tennis.svg', 'stolni-tenis');
        $sports[] = new Sport(4, 'Košarka', '/icons/sports/basketball.svg', 'kosarka');
        $sports[] = new Sport(5, 'Nogomet', '/icons/sports/football.svg', 'nogomet');
        $sports[] = new Sport(6, 'Golf', '/icons/sports/golf.svg', 'golf');
        $sports[] = new Sport(7, 'Kuglanje', '/icons/sports/bowling.svg', 'kuglanje');
        $sports[] = new Sport(8, 'Biljar', '/icons/sports/billard.svg', 'biljar');
        $sports[] = new Sport(9, 'Badminton', '/icons/sports/badminton.svg', 'badminton');

        foreach ($sports as $sport) {
            $io->writeln(sprintf('Adding sport %s', $sport->getName()));

            $this->sportRepository->save($sport);
        }

        $center = new Center(
            'Sportski centar Lipotic',
            'Sportski centar Lipotic description',
            'pero@lipotic.com',
            '+385 91 897 2122',
            new Address(
                'Put Petra',
                'Kaštela',
                new Coordinate(
                    '43.522835',
                    '16.469226'
                )
            ),
            $this->getOpeningHours(),
            'sportski-centar-lipotic'
        );

        $center->addCourt(
            new Court(
                'Vanjski teren cage',
                '150-240kn',
                'Vanjski description',
                $sports[0],
                [
                    'https://epodravina.hr/wp-content/uploads/2019/01/11-1-640x480.jpg',
                    'https://fitnesscentarjoker.hr/wp-content/uploads/2017/05/cageball.jpg',
                    'https://www.glaspodravine.hr/wp-content/uploads/2019/01/1Q7A2279-750x500.jpg',
                ],
                )
        );

        $center->addCourt(
            new Court(
                'Unutarnji cage',
                '160-250kn',
                'Unutarnji description',
                $sports[0],
                [
                    'https://epodravina.hr/wp-content/uploads/2019/01/11-1-640x480.jpg',
                    'https://fitnesscentarjoker.hr/wp-content/uploads/2017/05/cageball.jpg',
                ],
            ),
        );

        $this->centersRepository->save($center);
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
}
