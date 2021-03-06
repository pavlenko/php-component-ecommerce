<?php

namespace PE\Component\ECommerce\Order\Model;

interface OrderInterface
{
    /**
     * @return string
     */
    public function getID();

    /**
     * @param string $id
     *
     * @return self
     */
    public function setID($id);

    /**
     * @return ContactInterface
     */
    public function getContact();

    /**
     * @param ContactInterface $contact
     *
     * @return self
     */
    public function setContact(ContactInterface $contact);

    /**
     * @return PurchaseInterface[]
     */
    public function getPurchases();

    /**
     * @param PurchaseInterface $purchase
     *
     * @return self
     */
    public function addPurchase(PurchaseInterface $purchase);

    /**
     * @param PurchaseInterface $purchase
     *
     * @return self
     */
    public function removePurchase(PurchaseInterface $purchase);
}