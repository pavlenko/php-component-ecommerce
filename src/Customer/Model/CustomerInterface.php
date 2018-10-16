<?php

namespace PE\Component\ECommerce\Customer\Model;

interface CustomerInterface
{
    /**
     * @return int
     */
    public function getID();

    /**
     * @param int $id
     *
     * @return self
     */
    public function setID($id);

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @param string $firstName
     *
     * @return self
     */
    public function setFirstName($firstName);

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @param string $lastName
     *
     * @return self
     */
    public function setLastName($lastName);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $email
     *
     * @return self
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getPhone();

    /**
     * @param string $phone
     *
     * @return self
     */
    public function setPhone($phone);
}