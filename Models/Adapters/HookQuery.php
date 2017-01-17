<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    16/01/17
 * Time:    15:06
 * Project: PartFire MangoPay Bundle
 * File:    HookQuery.php
 *
 **/

namespace PartFire\MangoPayBundle\Models\Adapters;

use MangoPay\MangoPayApi;
use MangoPay\Hook;
use PartFire\MangoPayBundle\Models\DTOs\Hook as PFHook;
use PartFire\MangoPayBundle\Models\HookQueryInterface;
use Symfony\Bridge\Monolog\Logger;

class HookQuery extends AbstractQuery implements HookQueryInterface
{
    private $walletTranslator;

    public function __construct(
        $clientId,
        $clientPassword,
        $baseUrl,
        MangoPayApi $mangoPayApi,
        Logger $logger

    ) {
        parent::__construct($clientId, $clientPassword, $baseUrl,$mangoPayApi, $logger);
    }

    public function list()
    {
        return $this->mangoPayApi->Hooks->GetAll();
    }

    public function create($hookEventName, $url)
    {
        $newHook = new PFHook();
        $newHook->setEventType($hookEventName);
        $newHook->setUrl($url);
        $newHook->setTag("FF-Console");

        return $this->mangoPayApi->Hooks->Create($this->transferFromDTOToMango($newHook));
    }

    public function update($hookId, $url)
    {
        $updateHook = new PFHook();
        $updateHook->setId($hookId);
        $updateHook->setUrl($url);

        return $this->mangoPayApi->Hooks->Update($this->transferFromDTOToMango($updateHook));
    }

    private function transferFromDTOToMango(PFHook $hook) : Hook
    {
        $newHook = new Hook();
        $newHook->EventType = $hook->getEventType();
        $newHook->Url = $hook->getUrl();

        if (!is_null($hook->getId())) {
            $newHook->Id = $hook->getId();
        }

        return $newHook;
    }

}