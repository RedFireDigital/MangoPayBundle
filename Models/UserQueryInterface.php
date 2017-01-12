<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    24/11/2016
 * Time:    19:56
 * File:    UserInterface.php
 **/
namespace PartFire\MangoPayBundle\Models;

use PartFire\MangoPayBundle\Models\DTOs\UserBase;

interface UserQueryInterface
{
    public function create(UserBase $userDto);

    public function get($userId);

    public function getAll();

    public function update(UserBase $userDto);

    public function delete($userId);
}
