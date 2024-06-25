<?php

class SiteController
{
    function actionIndex()
    {
        $orders = Order::getOrders();

        require_once($_SERVER['DOCUMENT_ROOT'] . '/views/site/index.php');

        return true;
    }

}