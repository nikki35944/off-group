<?php
require $_SERVER['DOCUMENT_ROOT'] . '/components/Db.php';
require $_SERVER['DOCUMENT_ROOT'] . '/models/Order.php';
require $_SERVER['DOCUMENT_ROOT'] . '/models/Customer.php';


if  (isset($_POST['add_order']) ) {

    $postData = [];
    foreach ($_POST as $key => $value) {
        if ($value !== '') {
            $postData[$key] = $value;
        }
    }

    if ( !empty($postData['name']) && !empty($postData['surname']) ) {
        //Добавить нового пользователя
        $newCustomerId = Customer::addCustomer($postData);
        $postData['customer_id'] = $newCustomerId;

        Order::addOrder($postData);
        //чтоб не задублировались пользователи
        unset($postData['customer_id']);

    } elseif ( !empty($postData['customer_id']) ) {
        Order::addOrder($postData);
    }

}