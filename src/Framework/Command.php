<?php

declare(strict_types=1);

namespace Timeout\Framework;

use Symfony\Component\Console\Command\Command as ConsoleCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

abstract class Command extends ConsoleCommand
{
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $io = new SymfonyStyle($input, $output);

        $this->exec($input, $io);
    }

    protected function runCommand(string $command, array $arguments = []): int
    {
        $arguments['command'] = $command;

        $command = $this->getApplication()->find($command);

        return $command->run(new ArrayInput($arguments), new ConsoleOutput());
    }

    abstract function exec(InputInterface $input, OutputInterface $io): void;
}
