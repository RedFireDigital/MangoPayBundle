<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    27/11/2016
 * Time:    21:12
 * File:    AbstractQuery.php
 **/

namespace PartFire\MangoPayBundle\Models\Adapters;

use MangoPay\MangoPayApi;
use Symfony\Bridge\Monolog\Logger;

abstract class AbstractQuery
{
    /**
     * @var MangoPayApi
     */
    protected $mangoPayApi;
    /**
     * @var Logger
     */
    protected $logger;

    public function __construct($clientId, $clientPassword, $baseUrl, MangoPayApi $mangoPayApi, Logger $logger)
    {
        $this->mangoPayApi = $mangoPayApi;
        $this->mangoPayApi->Config->ClientId = $clientId;
        $this->mangoPayApi->Config->ClientPassword = $clientPassword;
        $this->mangoPayApi->Config->BaseUrl = $baseUrl;
        $this->mangoPayApi->Config->TemporaryFolder = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'mangopay-'.$clientId;
        $this->mangoPayApi->setLogger($logger);
        $this->logger = $logger;
    }
}
