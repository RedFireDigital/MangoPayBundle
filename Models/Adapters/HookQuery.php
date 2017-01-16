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

    public function create($hookEventName)
    {
        $this->mangoPayApi->Hooks->Create($hookEventName)
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

}