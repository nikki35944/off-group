<?php
/**
 * @var array $order
 */

include $_SERVER['DOCUMENT_ROOT'] . '/views/layouts/header.php';
?>

<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Просмотр заказа</li>
        </ol>
    </nav>

    <h1>Заказ клиента <?= $order['surname'] . ' ' . $order['name'] ?></h1>
    <div class="items-container mt-5">
        <div class="row">
            <div class="col-md-4 column-separator">
                <h3>Описание заказа:</h3>
                <p><?= nl2br($order['description']) ?></p>
            </div>
            <div class="col-md-4 column-separator">
                <h3>Контакты:</h3>
                <p><?= nl2br($order['contacts']) ?></p>
                <h3>Сумма:</h3>
                <p><?= $order['price'] ?></p>
                <p><?= ($order['is_paid']) ? 'Заказ оплачен' : 'Заказ не опалчен' ?></p>
            </div>
            <div class="col-md-4 column-separator">
                <h3>Информация о покупателе</h3>
                <div class="items-container mt-3">
                    <p><b>Имя: </b><?= $order['surname'] . ' ' . $order['name'] ?></p>
                    <a href="/customer/<?= $order['customer_id'] ?>">Список заказов</a>
                </div>
            </div>
        </div>

    </div>
</div>



<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/layouts/footer.php'; ?>