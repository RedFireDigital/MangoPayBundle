<?php
/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 * Copyright © 2016 PartFire Ltd. All rights reserved.
 *
 * User:    Carl Owens
 * Date:    28/11/2016
 * Time:    16:07
 * File:    User.php
 **/

namespace PartFire\MangoPayBundle\Services;

use PartFire\MangoPayBundle\Models\DTOs\User as UserDto;
use PartFire\MangoPayBundle\Models\UserQueryInterface;

class User
{
    /**
     * @var UserQueryInterface
     */
    private $userQuery;

    public function __construct(UserQueryInterface $userQuery)
    {
        $this->userQuery = $userQuery;
    }

    /**
     * @param UserDto $user
     * @return mixed
     */
    public function create(UserDto $user)
    {
        return $this->userQuery->create($user);
    }
}
