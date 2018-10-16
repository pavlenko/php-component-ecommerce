<?php

namespace PE\Component\ECommerce\Customer\Model;

class Customer implements CustomerInterface
{
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $phone;

    /**
     * @inheritDoc
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function setID($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @inheritDoc
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @inheritDoc
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @inheritDoc
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }
}