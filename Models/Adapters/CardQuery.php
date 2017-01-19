<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2017 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    18/01/2017
 * Time:    23:53
 * File:    CardQuery.php
 **/

namespace PartFire\MangoPayBundle\Models\Adapters;

use MangoPay\Card as mangoCard;
use PartFire\MangoPayBundle\Models\CardQueryInterface;
use PartFire\MangoPayBundle\Models\DTOs\Card;
use MangoPay\MangoPayApi;
use PartFire\MangoPayBundle\Models\DTOs\Translators\CardTranslator;
use Symfony\Bridge\Monolog\Logger;
use PartFire\MangoPayBundle\Models\Exception as PartFireException;
use MangoPay\Libraries\Exception;
use MangoPay\Libraries\ResponseException;

class CardQuery extends AbstractQuery implements CardQueryInterface
{
    /**
     * @var CardTranslator
     */
    private $cardTranslator;

    /**
     * CardQuery constructor.
     * @param $clientId
     * @param $clientPassword
     * @param $baseUrl
     * @param MangoPayApi $mangoPayApi
     * @param Logger $logger
     * @param CardTranslator $cardTranslator
     */
    public function __construct(
        $clientId,
        $clientPassword,
        $baseUrl,
        MangoPayApi $mangoPayApi,
        Logger $logger,
        CardTranslator $cardTranslator
    ) {
        parent::__construct($clientId, $clientPassword, $baseUrl, $mangoPayApi, $logger);
        $this->cardTranslator = $cardTranslator;
    }

    /**
     * @param string $cardId
     * @return null|Card
     * @throws PartFireException
     */
    public function get(string $cardId): ? Card
    {
        try {
            $card = $this->mangoPayApi->Cards->Get($cardId);
            if ($card instanceof mangoCard) {
                return $this->cardTranslator->translateMangoCardToDto($card);
            }
            $this->logger->addCritical("Card ID: $cardId not found when querying API.");
            throw new PartFireException("Card ID: $cardId not found when querying API.");
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function deactivate(string $cardId): ? Card
    {
        try {
            $card = $this->mangoPayApi->Cards->Get($cardId);
            if ($card instanceof mangoCard) {
                $card->Active = false;
                $card = $this->mangoPayApi->Cards->Update($card);
                return $this->cardTranslator->translateMangoCardToDto($card);
            }
            $this->logger->addCritical("Card ID: $cardId not found when querying API.");
            throw new PartFireException("Card ID: $cardId not found when querying API.");
        } catch (ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        } catch (Exception $e) {
            $this->logger->addError($e->getMessage());
            throw new PartFireException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
