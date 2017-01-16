<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    16/01/17
 * Time:    16:11
 * Project: PartFire MangoPay Bundle
 * File:    HookCreateAllCommand.php
 *
 **/

namespace PartFire\MangoPayBundle\Command;

use Fruitful\IdentityCheckBundle\Entity\IdentityCheck;
use Fruitful\IdentityCheckBundle\Entity\Repository\IdentityCheckFactoryRepository;
use Fruitful\IdentityCheckBundle\Event\IdentityCheckUpdateEvent;
use PartFire\CommonBundle\Services\Output\Cli\ConsoleOutput;
use PartFire\MangoPayBundle\MangoPayConstants;
use PartFire\MangoPayBundle\Services\Hook;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class HookCreateAllCommand extends ContainerAwareCommand
{

    private $output;

    protected function configure()
    {
        $this
            ->setName('partfire:mangopay:hook-create-all')
            ->setDescription('Points all known hooks to a single endpoint')
        ;

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $this->getConsoleOutPutter();
        $this->output->setOutputer($output);

        $this->output->info("Create all hooks to point to a single end point");

        foreach (MangoPayConstants::getAllEventTypes() as $eventType) {
            $this->output->infoid("Creating end point for " . $eventType);
        }
    }

    private function showTitle($title)
    {
        $this->output->info(str_pad(" " . $title . " ", 80, "-", STR_PAD_BOTH));
    }

    private function getConsoleOutPutter() : ConsoleOutput
    {
        return $this->getContainer()->get('partfire_common.output_console');
    }

    private function getHookService() : Hook
    {
        return $this->getContainer()->get('part_fire_mango_pay.services.hook');
    }

}