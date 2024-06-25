<?php

class CustomerService
{
    public static function getOverallPrice($orders)
    {
        $overallPrice = 0;
        foreach ($orders as $order) {
            $overallPrice += $order['price'];
        }

        return $overallPrice;
    }
}