<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    20/01/17
 * Time:    16:04
 * Project: PartFire MangoPay Bundle
 * File:    WebHookDispatchCommand.php
 *
 **/

namespace PartFire\MangoPayBundle\Command;

use Fruitful\IdentityCheckBundle\Entity\IdentityCheck;
use Fruitful\IdentityCheckBundle\Entity\Repository\IdentityCheckFactoryRepository;
use Fruitful\IdentityCheckBundle\Event\IdentityCheckUpdateEvent;
use PartFire\CommonBundle\Services\Output\Cli\ConsoleOutput;
use PartFire\MangoPayBundle\Services\Hook;
use PartFire\MangoPayBundle\Services\HookHandleService;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class WebHookDispatchCommand extends ContainerAwareCommand
{

    private $output;

    protected function configure()
    {
        $this
            ->setName('partfire:mangopay:webhook-dispatch')
            ->setDescription('Checks for new hooks and dispatches them')
        ;

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->output = $this->getConsoleOutPutter();
        $this->output->setOutputer($output);

        $this->output->info("Checking for new MangoPay Hooks");
        $this->getPartFireMangoPayService()->processNewWebhooks($this->output);
    }

    private function showTitle($title)
    {
        $this->output->info(str_pad(" " . $title . " ", 80, "-", STR_PAD_BOTH));
    }

    private function getConsoleOutPutter() : ConsoleOutput
    {
        return $this->getContainer()->get('partfire_common.output_console');
    }

    private function getPartFireMangoPayService() : HookHandleService
    {
        return $this->getContainer()->get('part_fire_mango_pay.services.webhook');
    }

}