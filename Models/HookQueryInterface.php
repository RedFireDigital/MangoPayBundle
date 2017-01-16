<?php
/**
 * Created by Graham Owens (gra@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Console: Discovery
 *
 * User:    gra
 * Date:    16/01/17
 * Time:    14:53
 * Project: PartFire MangoPay Bundle
 * File:    HookQueryInterface.php
 *
 **/

namespace PartFire\MangoPayBundle\Models;


interface HookQueryInterface
{
    public function list();

    public function create();

    public function update();
}