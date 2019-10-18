<?php

namespace App\Command;

use App\Entity\Sport;
use App\Repository\SportRepository;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TimeoutInstall extends Command
{
    /** @var SportRepository */
    private $sportRepository;

    public function __construct(SportRepository $sportRepository)
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
    }
}
