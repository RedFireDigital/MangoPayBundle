<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    20/01/2017
 * Time:    13:10
 * File:    BankAccountQuery.php
 **/

namespace PartFire\MangoPayBundle\Models\Adapters;

use MangoPay\BankAccount;
use PartFire\MangoPayBundle\Models\BankAccountQueryInterface;
use PartFire\MangoPayBundle\Models\DTOs\AbstractBankAccount;
use PartFire\MangoPayBundle\Models\DTOs\GbBankAccount;
use PartFire\MangoPayBundle\Models\DTOs\IbanBankAccount;
use MangoPay\MangoPayApi;
use PartFire\MangoPayBundle\Models\DTOs\Translators\BankAccountTranslator;
use Symfony\Bridge\Monolog\Logger;
use PartFire\MangoPayBundle\Models\Exception as PartFireException;
use MangoPay\Libraries\Exception;
use MangoPay\Libraries\ResponseException;

class BankAccountQuery extends AbstractQuery implements BankAccountQueryInterface
{
    /**
     * @var BankAccountTranslator
     */
    private $bankAccountTranslator;

    public function __construct(
        $clientId,
        $clientPassword,
        $baseUrl,
        MangoPayApi $mangoPayApi,
        Logger $logger,
        BankAccountTranslator $bankAccountTranslator
    ) {
        parent::__construct($clientId, $clientPassword, $baseUrl, $mangoPayApi, $logger);
        $this->bankAccountTranslator = $bankAccountTranslator;
    }

    public function createIbanBankAccount(IbanBankAccount $ibanBankAccount): IbanBankAccount
    {
        try {
            $bankAccount = $this->bankAccountTranslator->translateIbanDtoToMango($ibanBankAccount);
            $bankAccount = $this->mangoPayApi->Users->CreateBankAccount($ibanBankAccount->getUserId(), $bankAccount);
            if ($bankAccount instanceof BankAccount) {
                return $this->bankAccountTranslator->translateMangoToIbanDto($bankAccount);
            }
            $this->logger->addCritical("Bank account not created when querying API.");
            throw new PartFireException("Bank account not created when querying API.");
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function createGbBankAccount(GbBankAccount $gbBankAccount) : GbBankAccount
    {
        try {
            $bankAccount = $this->bankAccountTranslator->translateGbDtoToMango($gbBankAccount);
            $bankAccount = $this->mangoPayApi->Users->CreateBankAccount($gbBankAccount->getUserId(), $bankAccount);
            if ($bankAccount instanceof BankAccount) {
                return $this->bankAccountTranslator->translateMangoToGbDto($bankAccount);
            }
            $this->logger->addCritical("Bank account not created when querying API.");
            throw new PartFireException("Bank account not created when querying API.");
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function deactivate($userId, $bankAccountId) : bool
    {
        try {
            $bankAccount = $this->mangoPayApi->Users->UpdateBankAccount($userId, $bankAccountId);
            if ($bankAccount instanceof BankAccount) {
                return true;
            }
            $this->logger->addCritical("Bank account not deactivated when querying API.");
            throw new PartFireException("Bank account not deactivated when querying API.");
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param $userId
     * @param $bankAccountId
     * @return AbstractBankAccount
     * @throws PartFireException
     */
    public function get($userId, $bankAccountId) : AbstractBankAccount
    {
        try {
            $bankAccount = $this->mangoPayApi->Users->GetBankAccount($userId, $bankAccountId);
            if ($bankAccount instanceof BankAccount) {
                if ($bankAccount->Type == 'IBAN') {
                    return $this->bankAccountTranslator->translateMangoToIbanDto($bankAccount);
                }
                return $this->bankAccountTranslator->translateMangoToGbDto($bankAccount);
            }
            $this->logger->addCritical("Bank account not deactivated when querying API.");
            throw new PartFireException("Bank account not deactivated when querying API.");
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getAll($userId)
    {
        // TODO: Implement getAll() method.
    }
}