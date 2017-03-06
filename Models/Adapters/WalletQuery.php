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

    /**
     * WalletQuery constructor.
     * @param $clientId
     * @param $clientPassword
     * @param $baseUrl
     * @param MangoPayApi $mangoPayApi
     * @param Logger $logger
     * @param WalletTranslator $walletTranslator
     */
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
        } catch(ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch(Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
        return $this->walletTranslator->convertMangoPayWalletToDTO($mangoWallet);
    }

    public function get($walletId)
    {
        try {
            $mangoWallet = $this->mangoPayApi->Wallets->Get($walletId);
        } catch(ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch(Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
        return $this->walletTranslator->convertMangoPayWalletToDTO($mangoWallet);
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
