# MangoPayBundle
A set of Symfony services for use in your project to ease integration with Mangopay API. 

This bundle depends upon the [official Mangopay SDK PHP for Mangopay API v2](https://github.com/Mangopay/mangopay2-php-sdk).  This means that this bundle only support Mangopay API version 2.

#Notice
This bundle is still in development.

## Configuration

Add your details to your `app/config/parameters.yml` file.  For example:
```yaml
    mangopay_client_id: my_mango_id
    mangopay_client_password: XXXXXXXXXXXXXXXXXXXXXX
    mangopay_base_url: 'https://api.sandbox.mangopay.com'
```
## Example Usage

### Users

#### Create a user

```php
    $userService = $this->container->get('part_fire_mango_pay.services.user');
    
    $userDto = new \PartFire\MangoPayBundle\Models\DTOs\User();
    $userDto->setFirstName('Dick');
    $userDto->setLastName('Jones');
    $userDto->setBirthday(new \DateTime());
    $userDto->setEmail('dick.jones@test.com');
    $userDto->setNationality('GB');
    $userDto->setCountryOfResidence('GB');
    
    $userDtoUpdated = $userService->create($userDto);
    
    if ($userDtoUpdated instanceof \PartFire\MangoPayBundle\Models\DTOs\User) {
        $userDtoUpdated->getId(); //The users MangoPay ID, DTO fully populated.
    }
    
    if ($userDtoUpdated instanceof \PartFire\MangoPayBundle\Models\Exceptions) {
        //an error you can deal with
    }
 ```
 
### Wallets

#### Create a wallet

```php
    $walletService = $this->container->get('part_fire_mango_pay.services.wallet');

    $walletDto = new \PartFire\MangoPayBundle\Models\DTOs\Wallet();
    $walletDto->setTag('TAG1');
    $walletDto->setOwenerId('123456');
    //$walletDto->setOwenerIds(['123456']);
    $walletDto->setDescription('A natural users wallet');
    $walletDto->setCurrency('GBP');
    
    $walletDtoUpdated = $walletService->create($walletDto);
        
    if ($walletDtoUpdated instanceof \PartFire\MangoPayBundle\Models\DTOs\Wallet) {
        $walletDtoUpdated->getId(); //The wallet DTO populated with MangoPay ID.
    }
    
    if ($walletDtoUpdated instanceof \PartFire\MangoPayBundle\Models\Exceptions) {
        //an error you can deal with
    }
```
    
## Service List

    part_fire_mango_pay.services.user
    part_fire_mango_pay.services.wallet


