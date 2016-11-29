<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    28/11/2016
 * Time:    16:34
 * File:    WalletQuery.php
 **/

namespace PartFire\MangoPayBundle\Models\Adapters;

use MangoPay\Libraries\Exception;
use MangoPay\Libraries\ResponseException;
use MangoPay\MangoPayApi;
use PartFire\MangoPayBundle\Models\DTOs\Translators\WalletTranslator;
use PartFire\MangoPayBundle\Models\DTOs\Wallet;
use PartFire\MangoPayBundle\Models\WalletQueryInterface;
use PartFire\MangoPayBundle\Models\Exception as PartFireException;
use Symfony\Bridge\Monolog\Logger;

class WalletQuery extends AbstractQuery implements WalletQueryInterface
{
    /**
     * @var WalletTranslator
     */
    protected $walletTranslator;

    public function __construct(
        $clientId,
        $clientPassword,
        $baseUrl,
        MangoPayApi $mangoPayApi,
        Logger $logger,
        WalletTranslator $walletTranslator
    ) {
        parent::__construct($clientId, $clientPassword, $baseUrl,$mangoPayApi, $logger);
        $this->walletTranslator = $walletTranslator;
    }

    public function create(Wallet $walletDto)
    {
        $mangoWallet = $this->walletTranslator->convertDTOToMangoPayWallet($walletDto);
        try {
            $mangoWallet = $this->mangoPayApi->Wallets->Create($mangoWallet);
        } catch(MangoPay\Libraries\ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            return new PartFireException($e->getMessage(), $e->getCode());
        } catch(MangoPay\Libraries\Exception $e) {
            $this->logger->addError($e->getMessage());
            return new PartFireException($e->getMessage(), $e->getCode());
        }
        return $this->walletTranslator->convertMangoPayWalletToDTO($mangoWallet);

    }

    public function get($walletId)
    {
        // TODO: Implement get() method.
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function delete($walletId)
    {
        // TODO: Implement delete() method.
    }

}
