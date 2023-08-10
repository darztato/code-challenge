<?php

declare(strict_types=1);

namespace Domain\Customer;

use App\Domain\Customer\Models\Customer;
use Tests\TestCase;

final class CustomerTest extends TestCase
{
    /**
     * @return void
     */
    public function test_set_city_successfully() :void
    {
        $service = new Customer();

        $object = $service->setCity('Test City');

        $this->assertInstanceOf(Customer::class, $object);
    }

    public function test_set_country_successfully() :void
    {
        $service = new Customer();

        $object = $service->setCountry('Test Country');

        $this->assertInstanceOf(Customer::class, $object);
    }

    public function test_set_email_successfully() :void
    {
        $service = new Customer();

        $object = $service->setEmail('test@email.com');

        $this->assertInstanceOf(Customer::class, $object);
    }

    public function test_set_firstname_successfully() :void
    {
        $service = new Customer();

        $object = $service->setFirstName('Test Firstname');

        $this->assertInstanceOf(Customer::class, $object);
    }

    public function test_set_gender_successfully() :void
    {
        $service = new Customer();

        $object = $service->setGender('male');

        $this->assertInstanceOf(Customer::class, $object);
    }

    public function test_set_password_successfully() :void
    {
        $service = new Customer();

        $object = $service->setPassword('testpassword');

        $this->assertInstanceOf(Customer::class, $object);
    }

    public function test_set_phone_successfully() :void
    {
        $service = new Customer();

        $object = $service->setPhone('12312312312');

        $this->assertInstanceOf(Customer::class, $object);
    }

    public function test_set_username_successfully() :void
    {
        $service = new Customer();

        $object = $service->setUserName('test_username');

        $this->assertInstanceOf(Customer::class, $object);
    }

    public function test_get_city_successfully() :void
    {
        $service = new Customer();

        $service->setCity('Test City');

        $this->assertEquals('Test City', $service->getCity());
    }

    public function test_get_country_successfully() :void
    {
        $service = new Customer();

        $service->setCountry('Test Country');

        $this->assertEquals('Test Country', $service->getCountry());
    }

    public function test_get_email_successfully() :void
    {
        $service = new Customer();

        $service->setEmail('test@email.com');

        $this->assertEquals('test@email.com', $service->getEmail());
    }

    public function test_get_firstname_successfully() :void
    {
        $service = new Customer();

        $service->setFirstName('Test Firstname');

        $this->assertEquals('Test Firstname', $service->getFirstName());
    }

    public function test_get_gender_successfully() :void
    {
        $service = new Customer();

        $service->setGender('male');

        $this->assertEquals('male', $service->getGender());
    }

    public function test_get_lastname_successfully() :void
    {
        $service = new Customer();

        $service->setLastName('Test Lastname');

        $this->assertEquals('Test Lastname', $service->getLastName());
    }

    public function test_get_password_successfully() :void
    {
        $service = new Customer();

        $service->setPassword('testpassword');

        $this->assertEquals('testpassword', $service->getPassword());
    }

    public function test_get_phone_successfully() :void
    {
        $service = new Customer();

        $service->setPhone('12312312312');

        $this->assertEquals('12312312312', $service->getPhone());
    }

    public function test_get_username_successfully() :void
    {
        $service = new Customer();

        $service->setUserName('test_username');

        $this->assertEquals('test_username', $service->getUsername());
    }

    public function test_get_city_unsuccessfully() :void
    {
        $service = new Customer();

        $service->setCity('Test City');

        $this->assertNotEquals('Test City2', $service->getCity());
    }

    public function test_get_country_unsuccessfully() :void
    {
        $service = new Customer();

        $service->setCountry('Test Country');

        $this->assertNotEquals('Test Country2', $service->getCountry());
    }

    public function test_get_email_unsuccessfully() :void
    {
        $service = new Customer();

        $service->setEmail('test@email.com');

        $this->assertNotEquals('test2@email.com', $service->getEmail());
    }

    public function test_get_firstname_unsuccessfully() :void
    {
        $service = new Customer();

        $service->setFirstName('Test Firstname');

        $this->assertNotEquals('Test Firstname2', $service->getFirstName());
    }

    public function test_get_gender_unsuccessfully() :void
    {
        $service = new Customer();

        $service->setGender('male');

        $this->assertNotEquals('female', $service->getGender());
    }

    public function test_get_lastname_unsuccessfully() :void
    {
        $service = new Customer();

        $service->setLastName('Test Lastname');

        $this->assertNotEquals('Test Lastname2', $service->getLastName());
    }

    public function test_get_password_unsuccessfully() :void
    {
        $service = new Customer();

        $service->setPassword('testpassword');

        $this->assertNotEquals('testpassword2', $service->getPassword());
    }

    public function test_get_phone_unsuccessfully() :void
    {
        $service = new Customer();

        $service->setPhone('12312312312');

        $this->assertNotEquals('12312312311', $service->getPhone());
    }

    public function test_get_username_unsuccessfully() :void
    {
        $service = new Customer();

        $service->setUserName('test_username');

        $this->assertNotEquals('test_username2', $service->getUsername());
    }
}
