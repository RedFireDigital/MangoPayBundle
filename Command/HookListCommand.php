<?php

/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    13/01/17
 * Time:    16:23
 * Project: fruitful-property-investments
 * File:    HookListCommand.php
 *
 **/


namespace PartFire\MangoPayBundle\Command;

use Fruitful\IdentityCheckBundle\Entity\IdentityCheck;
use Fruitful\IdentityCheckBundle\Entity\Repository\IdentityCheckFactoryRepository;
use Fruitful\IdentityCheckBundle\Event\IdentityCheckUpdateEvent;
use PartFire\CommonBundle\Services\Output\Cli\ConsoleOutput;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class HookListCommand extends ContainerAwareCommand
{

    private $output;

    protected function configure()
    {
        $this
            ->setName('partfire:mangopay:hook-list')
            ->setDescription('Shows all hooks registered in Mango')
            ;

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $this->getConsoleOutPutter();
        $this->output->setOutputer($output);

        $this->output->info("Listing all hooks with MangoPay");


    }

    private function showTitle($title)
    {
        $this->output->info(str_pad(" " . $title . " ", 80, "-", STR_PAD_BOTH));
    }

    private function getConsoleOutPutter() : ConsoleOutput
    {
        return $this->getContainer()->get('partfire_common.output_console');
    }

}