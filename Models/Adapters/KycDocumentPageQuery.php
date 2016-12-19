<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    06/12/2016
 * Time:    21:30
 * File:    KycDocumentPageQuery.php
 **/

namespace PartFire\MangoPayBundle\Models\Adapters;

use MangoPay\MangoPayApi;
use Monolog\Logger;
use PartFire\MangoPayBundle\Models\DTOs\KycDocumentPage;
use PartFire\MangoPayBundle\Models\DTOs\Translators\KycDocumentPageTranslator;
use PartFire\MangoPayBundle\Models\KycDocumentPageQueryInterface;
use MangoPay\Libraries\ResponseException;
use MangoPay\Libraries\Exception;
use PartFire\MangoPayBundle\Models\Exception as PartFireException;

class KycDocumentPageQuery extends AbstractQuery implements KycDocumentPageQueryInterface
{
    /**
     * @var KycDocumentPageTranslator
     */
    protected $kycDocumentPageTranslator;

    /**
     * KycDocumentPageQuery constructor.
     * @param $clientId
     * @param $clientPassword
     * @param $baseUrl
     * @param MangoPayApi $mangoPayApi
     * @param Logger $logger
     * @param KycDocumentPageTranslator $kycDocumentPageTranslator
     */
    public function __construct(
        $clientId,
        $clientPassword,
        $baseUrl,
        MangoPayApi $mangoPayApi,
        Logger $logger,
        KycDocumentPageTranslator $kycDocumentPageTranslator
    ) {
        $this->kycDocumentPageTranslator = $kycDocumentPageTranslator;
        parent::__construct($clientId, $clientPassword, $baseUrl,$mangoPayApi, $logger);
    }

    /**
     * @param KycDocumentPage $kycDocumentPage
     * @return KycDocumentPage|PartFireException
     */
    public function create(KycDocumentPage $kycDocumentPage)
    {
        $mangoKycDocumentPage = $this->kycDocumentPageTranslator->convertDTOToMangoKycDocumentpage($kycDocumentPage);
        try {
            $this->mangoPayApi->Users->CreateKycPageFromFile($kycDocumentPage->getKycDocumentId(), $kycDocumentPage->getOwnerId(), $mangoKycDocumentPage);

        } catch(ResponseException $e) {
            $this->logger->addCritical($e->getMessage(), ['code' => $e->getCode(), 'details' => $e->GetErrorDetails()]);
            return new PartFireException($e->getMessage(), $e->getCode());
        } catch(Exception $e) {
            $this->logger->addError($e->getMessage());
            return new PartFireException($e->getMessage(), $e->getCode());
        }
        return $kycDocumentPage;
    }
}
