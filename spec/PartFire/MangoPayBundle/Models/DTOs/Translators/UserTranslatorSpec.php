<?php

namespace spec\PartFire\MangoPayBundle\Models\DTOs\Translators;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use MangoPay\UserNatural;
use PartFire\MangoPayBundle\Models\DTOs\UserNatural as User;

class UserTranslatorSpec extends ObjectBehavior
{
    private $userNatural;

    private $user;

    public function let()
    {
        $userNatural = new UserNatural();
        $this->userNatural = $userNatural;
        $this->userNatural->Email = 'test@example.com';
        $this->userNatural->Birthday = '1234567';
        $this->userNatural->PersonType = 'TEST';
        $this->userNatural->FirstName = 'larry';
        $this->userNatural->LastName = 'king';
        $this->userNatural->Nationality = 'GB';
        $this->userNatural->CountryOfResidence = 'GB';

        $user = new User();
        $this->user = $user;
        $this->user->setPersonType('TEST');
        $this->user->setFirstName('larry');
        $this->user->setLastName('king');
        $this->user->setBirthday('1234567');
        $this->user->setNationality('GB');
        $this->user->setCountryOfResidence('GB');
        $this->user->setEmail('test@example.com');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('PartFire\MangoPayBundle\Models\DTOs\Translators\UserTranslator');
    }

}
