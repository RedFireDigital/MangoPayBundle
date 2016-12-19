<?php

namespace spec\PartFire\MangoPayBundle\Models\DTOs\Translators;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use MangoPay\UserNatural;
use PartFire\MangoPayBundle\Models\DTOs\User;

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
        $this->user->setBirthdayUnixTimestamp('1234567');
        $this->user->setNationality('GB');
        $this->user->setCountryOfResidence('GB');
        $this->user->setEmail('test@example.com');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('PartFire\MangoPayBundle\Models\DTOs\Translators\UserTranslator');
    }

    function it_should_translate_from_mango_to_dto()
    {
        $this->convertMangoPayNaturalUserToDTO($this->userNatural)->shouldBeAnInstanceOf('PartFire\MangoPayBundle\Models\DTOs\User');
        $user = $this->convertMangoPayNaturalUserToDTO($this->userNatural);

        $user->getEmail()->shouldBe($this->user->getEmail());
        $user->getFirstName()->shouldBe($this->user->getFirstName());
        $user->getLastName()->shouldBe($this->user->getLastName());
        $user->getBirthdayUnixTimestamp()->shouldBe($this->user->getBirthdayUnixTimestamp());
        $user->getNationality()->shouldBe($this->user->getNationality());
        $user->getCountryOfResidence()->shouldBe($this->user->getCountryOfResidence());
        $user->getPersonType()->shouldBe($this->user->getPersonType());
    }

    function it_should_translate_from_dto_to_mango()
    {
        $this->convertDTOToMangoPayNaturalUser($this->user)->shouldBeAnInstanceOf('MangoPay\UserNatural');
        $userNatural = $this->convertDTOToMangoPayNaturalUser($this->user);

        $userNatural->Email->shouldBe($this->user->getEmail());
        $userNatural->Birthday->shouldBe($this->user->getBirthdayUnixTimestamp());
        $userNatural->PersonType->shouldBe($this->user->getPersonType());
        $userNatural->FirstName->shouldBe($this->user->getFirstName());
        $userNatural->LastName->shouldBe($this->user->getLastName());
        $userNatural->CountryOfResidence->shouldBe($this->user->getCountryOfResidence());
        $userNatural->Nationality->shouldBe($this->user->getCountryOfResidence());
    }
}
