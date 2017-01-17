<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    16/01/17
 * Time:    14:49
 * Project: PartFire MangoPay Bundle
 * File:    Hook.php
 *
 **/

namespace PartFire\MangoPayBundle\Services;

use PartFire\MangoPayBundle\Models\HookQueryInterface;

class Hook implements HookQueryInterface
{
    private $hookQuery;

    public function __construct(HookQueryInterface $hookQuery)
    {
        $this->hookQuery = $hookQuery;
    }

    public function list()
    {
        return $this->hookQuery->list();
    }

    public function create($hookEventName, $url)
    {
        return $this->hookQuery->create($hookEventName, $url);
    }

    public function update($hookId, $url)
    {
        return $this->hookQuery->update($hookId, $url);
    }
}