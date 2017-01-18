<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    27/11/2016
 * Time:    21:11
 * File:    UserQuery.php
 **/

namespace PartFire\MangoPayBundle\Models\Adapters;

use MangoPay\Libraries\Exception;
use MangoPay\Libraries\ResponseException;
use MangoPay\MangoPayApi;
use PartFire\MangoPayBundle\Models\DTOs\Translators\UserTranslator;
use PartFire\MangoPayBundle\Models\DTOs\User;
use PartFire\MangoPayBundle\Models\DTOs\UserBase;
use PartFire\MangoPayBundle\Models\DTOs\UserLegal as PFUserLegal;
use PartFire\MangoPayBundle\Models\DTOs\UserNatural as PFUserNatural;
use PartFire\MangoPayBundle\Models\Exception as PartFireException;
use PartFire\MangoPayBundle\Models\UserQueryInterface;
use Symfony\Bridge\Monolog\Logger;

class UserQuery extends AbstractQuery implements UserQueryInterface
{
    /**
     * @var UserTranslator
     */
    protected $userTranslator;

    /**
     * UserQuery constructor.
     * @param $clientId
     * @param $clientPassword
     * @param $baseUrl
     * @param MangoPayApi $mangoPayApi
     * @param Logger $logger
     * @param UserTranslator $userTranslator
     */
    public function __construct(
        $clientId,
        $clientPassword,
        $baseUrl,
        MangoPayApi $mangoPayApi,
        Logger $logger,
        UserTranslator $userTranslator
    ) {
        parent::__construct($clientId, $clientPassword, $baseUrl,$mangoPayApi, $logger);
        $this->userTranslator = $userTranslator;
    }

    public function createNatural(PFUserNatural $userDto)
    {
        $mangoUser = $this->userTranslator->convertDTOToMangoPayNaturalUser($userDto);
        try {
            $mangoUser = $this->mangoPayApi->Users->Create($mangoUser);
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
        return $this->userTranslator->convertMangoPayNaturalUserToDTO($mangoUser);
    }

    public function createLegal(PFUserLegal $userDto)
    {
        $mangoUser = $this->userTranslator->convertDTOToMangoPayLegalUser($userDto);
        var_dump($mangoUser);
        try {
            $mangoUser = $this->mangoPayApi->Users->Create($mangoUser);
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage() . " - " . $e->GetErrorDetails(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage() . " - " . $e->GetErrorDetails(), $e->getCode(), $e);
        }
        return $this->userTranslator->convertMangoPayLegalUserToDTO($mangoUser);
    }

    public function get($userId)
    {
        // TODO: Implement get() method.
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function update(UserBase $userDto)
    {
        // TODO: Implement update() method.
    }

    public function delete($userId)
    {
        // TODO: Implement delete() method.
    }
}
