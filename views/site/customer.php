<?php
/**
 * @var array $customer
 * @var array $orders
 * @var int $overallPrice
 */

include $_SERVER['DOCUMENT_ROOT'] . '/views/layouts/header.php';
?>

    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Заказы клиента <?= $customer['surname'] . ' ' . $customer['name'] ?></li>
            </ol>
        </nav>
    </div>


    <div class="row">
        <div class="col-md-7"><h1>Заказы клиента <?= $customer['surname'] . ' ' . $customer['name'] ?></h1></div>
        <div class="col-md-5 text-md-end"><p>Общая сумма заказов - <span class="price"><?= $overallPrice ?> руб.</span></p></div>
        <? foreach ($orders as $order): ?>
            <div class="card-item">
                <div class="row">
                    <div class="col-sm-4"><a href="/order/<?= $order['id'] ?>" class="text-muted">ID заказа - <?= $order['id'] ?></a></div>
                    <div class="col-sm-8 text-sm-end"><?= ($order['is_paid']) ? '<span class="pay-status text-success">Заказ оплачен</span>' : '<span class="pay-status text-danger">Заказ не опалчен</span>' ?></div>
                </div>
                <div class="row">
                    <h3>Описание:</h3>
                    <p><?= nl2br($order['description']) ?></p>
                    <hr>
                </div>
                <div class="row">
                    <h3>Контакты:</h3>
                    <p><?= nl2br($order['contacts']) ?></p>
                    <hr>
                </div>
                <div class="row">
                    <div class="text-sm-end"><span class="price"><?= $order['price'] ?> руб.</span></div>
                </div>
            </div>
        <? endforeach;?>


    </div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/layouts/footer.php'; ?>