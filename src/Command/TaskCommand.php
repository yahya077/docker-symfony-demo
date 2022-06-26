<?php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;

class TaskCommand extends Command {

    protected function configure(): void
    {
        $this->setName('app:task:pull')
            ->setDescription('This command pulls tasks from MockApi')
            ->setHelp('Run this command to get all tasks in your mockserver')
            ->addOption('force','-f',InputOption::VALUE_NONE,'It will delete all task data from database!');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $force = $input->getOption('force');
        $helper = $this->getHelper('question');
        $question = new ChoiceQuestion(
            'Which provider you want to insert from?',
            ['firstProvider: (endPoint=5d47f235330000623fa3ebf7)', 'secondProvider: (endPoint=5d47f24c330000623fa3ebfa)'],
            0
            );
        $provider = $helper->ask($input, $output, $question);
        if (var_export($force, true)){
            //reset table
            $output->writeln(sprintf('force is %s (%s)', var_export($force, true), gettype($force)));
        }
        $output->writeln('Pass the parameter' . explode(':',$provider)[0]);

        return Command::SUCCESS;
    }
}
