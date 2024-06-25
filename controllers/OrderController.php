<?php

class OrderController
{
    public function actionIndex($orderId)
    {
        $order = Order::getOrderById($orderId);

        require_once($_SERVER['DOCUMENT_ROOT'] . '/views/site/order.php');

        return true;
    }

    public function actionAdd()
    {
        $customers = Customer::getCustomers();

        require_once($_SERVER['DOCUMENT_ROOT'] . '/views/site/add.php');

        return true;
    }
}