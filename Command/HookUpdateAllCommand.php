<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Relativity
 *
 * User:    gra
 * Date:    16/01/2017
 * Time:    23:07
 * Project: PartFire MangoPay Bundle
 * File:    HookUpdateAllCommand.php
 *
 **/

namespace PartFire\MangoPayBundle\Command;

use Fruitful\IdentityCheckBundle\Entity\IdentityCheck;
use Fruitful\IdentityCheckBundle\Entity\Repository\IdentityCheckFactoryRepository;
use Fruitful\IdentityCheckBundle\Event\IdentityCheckUpdateEvent;
use PartFire\CommonBundle\Services\Output\Cli\ConsoleOutput;
use PartFire\MangoPayBundle\Services\Hook;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class HookUpdateAllCommand extends ContainerAwareCommand
{

    private $output;

    protected function configure()
    {
        $this
            ->setName('partfire:mangopay:hook-update-all')
            ->setDescription('Update all hook urls')
        ;

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $this->getConsoleOutPutter();
        $this->output->setOutputer($output);

        $this->output->info("Listing all hooks with MangoPay");

        $url = 'https://stage.fruitful.co/updated';

        $responses = [];

        $hookItems = $this->getHookService()->list();
        foreach($hookItems as $hook) {
            $hookId = $hook->Id;
            $this->output->infoid("Updating Hook ID " . $hookId . " with " . $url);
            $responses[] = $this->getHookService()->update($hookId, $url);
        }

        var_dump($responses);
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