<?php

class Customer
{
    public static function getCustomer($customerId)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * from customers WHERE id = :customerId';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':customerId', $customerId, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();
    }
    public static function getCustomerOrders($customerId)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM customers INNER JOIN orders on customers.id = orders.customer_id WHERE customers.id = :customerId';

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':customerId', $customerId, PDO::PARAM_INT);

        $stmt->execute();

        $result = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }

    public static function getCustomers()
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM customers';

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }

        return $result;
    }

    public static function addCustomer($data)
    {
        $db = Db::getConnection();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO customers (name, surname)
                     VALUES (:name, :surname)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $data['name']);
        $result->bindParam(':surname', $data['surname']);
        $result->execute();

        return $db->lastInsertId();
    }
}