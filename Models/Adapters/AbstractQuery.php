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

    public function __construct(MangoPayApi $mangoPayApi, Logger $logger)
    {
        $this->mangoPayApi = $mangoPayApi;
        $this->mangoPayApi->Config->ClientId = 'your-client-id';
        $this->mangoPayApi->Config->ClientPassword = 'your-client-password';
        $this->mangoPayApi->Config->TemporaryFolder = '/some/path/';
        $this->logger = $logger;
    }
}
