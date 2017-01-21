<?php

/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    20/01/17
 * Time:    09:28
 * Project: fruitful-property-investments
 * File:    MangoPayRepositoryFactory.php
 *
 **/

namespace PartFire\MangoPayBundle\Entity\Repository;

use PartFire\CommonBundle\Entity\Repository\Repository;
use PartFire\CommonBundle\Entity\Repository\RepositoryBaseFactory;

class MangoPayRepositoryFactory extends RepositoryBaseFactory implements Repository
{
    public $bundleName = "PartFireMangoPayBundle";

    public function getBundleName()
    {
        return $this->bundleName;
    }

    public function getEntityManagerName()
    {
        return $this->entityManagerName;
    }
}