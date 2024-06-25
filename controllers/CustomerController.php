<?php

class CustomerController
{
    public function actionIndex($customerId)
    {
        $customer = Customer::getCustomer($customerId);
        $orders = Customer::getCustomerOrders($customerId);
        $overallPrice = CustomerService::getOverallPrice($orders);

        require_once($_SERVER['DOCUMENT_ROOT'] . '/views/site/customer.php');

        return true;
    }
}