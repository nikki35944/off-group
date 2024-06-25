<?php

class Order
{
    public static function getOrders()
    {
        $db = Db::getConnection();
        $sql = 'SELECT * from orders';
        $result = $db->prepare($sql);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetchAll();
    }

    public static function getOrderById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM orders 
                INNER JOIN customers ON orders.customer_id = customers.id 
                WHERE orders.id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

        return $result->fetch();
    }

    public static function addOrder($data)
    {
        $db = Db::getConnection();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO orders (price, description, contacts, is_paid, customer_id)
                     VALUES (:price, :description, :contacts, :is_paid, :customer_id)';

        $result = $db->prepare($sql);
        $result->bindParam(':price', $data['price']);
        $result->bindParam(':description', $data['description']);
        $result->bindParam(':contacts', $data['contacts']);
        $result->bindParam(':is_paid', $data['is_paid']);
        $result->bindParam(':customer_id', $data['customer_id']);

        return $result->execute();
    }

}