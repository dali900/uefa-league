<?php
namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GammeCommand extends Command
{
    protected static $defaultName = 'game:start';
    protected static $defaultDescription = 'Running UEFA game.';

    protected function configure()
    {
        $this->setName('game:start')
            ->setDescription('Start the game')
            ->setHelp('Demonstration of custom commands created by Symfony Console component.')
            ->addArgument('team', InputArgument::REQUIRED, 'Pass the team.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        //$output->writeln(sprintf('Hello World!, %s', $input->getArgument('username')));
		
        return Command::SUCCESS;
    }
}
