<?php

namespace App\Command;

use App\Service\InputParser\Input;
use App\Service\InputParser\InputParserInterface;
use App\Service\InputParser\TextInputParser;
use JetBrains\PhpStorm\NoReturn;
use SebastianBergmann\CodeCoverage\Report\Text;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'rover:run',
    description: 'Execute rovers actions',
)]
class RoverRunCommand extends Command
{

    private InputParserInterface $inputParser;

    public function __construct(InputParserInterface $inputParser)
    {
        $this->inputParser = $inputParser;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('file', InputArgument::REQUIRED, 'Input file')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    #[NoReturn] protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $filePath = $input->getArgument('file');

        $content = file_get_contents($filePath);
        $input = $this->inputParser->parse($content);

        $output = [];
        foreach ($input->getRovers() as $rover) {
            $rover->executeActions($input->getGrid());
            $output[] = sprintf('%d %d %s',
                $rover->getCurrentPosition()->getXCoord(),
                $rover->getCurrentPosition()->getYCoord(),
                $rover->getCurrentPosition()->getFacing()
            );
        }

        $io->block($output);

        return Command::SUCCESS;
    }
}
