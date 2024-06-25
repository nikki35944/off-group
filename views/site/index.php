<?php
/**
 * @var array $orders
 */

include $_SERVER['DOCUMENT_ROOT'] . '/views/layouts/header.php';
?>


<div class="row p-0">
    <div class="text-md-end"><a href="/order/add/" class="btn btn-dark">Добавить заказ</a></div>
</div>

<div class="row mt-5">
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Общая стоимость</th>
                <th scope="col">Описание заказа</th>
                <th scope="col">Контактные данные</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($orders as $i => $order): ?>
                <tr onclick="document.location = '/order/<?= $order['id'] ?>'" class="table-link">
                    <th scope="row"><?= $i + 1 ?></th>
                    <td><?= $order['price'] ?></td>
                    <td><?= $order['description'] ?></td>
                    <td><?= $order['contacts'] ?></td>
                </tr>
            <? endforeach; ?>
            </tbody>
        </table>
</div>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/layouts/footer.php'; ?>