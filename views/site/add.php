<?php
/**
 * @var array $customers
 */
include $_SERVER['DOCUMENT_ROOT'] . '/views/layouts/header.php';
?>

    <h1>Добавить заказ</h1>
    <div class="row mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Добавить заказ</li>
            </ol>
        </nav>
    </div>

    <section>
        <div class="preloader d-none">
            <div class="opacity"></div>
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden"></span>
            </div>
        </div>
        <form method="POST" id="formAdd" enctype="multipart/form-data">
            <h3 class="mt-3">Информация о покупателе</h3>

            <div class="appearing-block add-customer-container">
                <div class="form-check form-switch">
                    <input class="form-check-input required-input" type="checkbox" role="switch" id="addNewCustomer" required>
                    <label class="form-check-label" for="addNewCustomer">Добавить нового покупателя</label>
                </div>
                <div class="inner-container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mt-4 mb-3">
                                <input type="text" class="form-control" name="surname" id="surname" placeholder="Фамилия *">
                                <label for="surname" class="form-label">Фамилия <span class="required">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mt-4 mb-3">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Имя *">
                                <label for="name" class="form-label">Имя <span class="required">*</span></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="appearing-block select-customer-container">
                <div class="form-check form-switch">
                    <input class="form-check-input required-input" type="checkbox" role="switch" id="selectCustomer">
                    <label class="form-check-label" for="selectCustomer">Выбрать из списка покупателей</label>
                </div>
                <div class="inner-container">
                    <div class="row">
                        <div class="col">
                            <div class="form-control mt-4 mb-3">
                                <label for="existing_customer" class="form-label">Выберете покупателя <span class="required">*</span></label>
                                <select class="form-select" name="customer_id" id="existing_customer" required>
                                    <option value="">Выберете вариант</option>
                                    <? foreach ($customers as $customer): ?>
                                        <option value="<?= $customer['id'] ?>"><?= $customer['surname'] . ' ' . $customer['name'] ?></option>
                                    <? endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <h3 class="mt-3">Информация о заказе</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mt-4 mb-3">
                        <textarea class="form-control" name="description" id="description" rows="7" required></textarea>
                        <label for="description" class="form-label">Описание заказа <span class="required">*</span></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mt-4 mb-3">
                        <textarea class="form-control" name="contacts" id="contacts" rows="7" required></textarea>
                        <label for="contacts" class="form-label">Контакты <span class="required">*</span></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-floating mt-4 mb-3">
                        <input type="number" class="form-control" name="price" id="price" placeholder="Цена *" required>
                        <label for="price" class="form-label">Общая стоимость <span class="required">*</span></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-control mt-4 mb-3">
                        <label for="is_paid" class="form-label">Заказ оплачен? <span class="required">*</span></label>
                        <select class="form-select" name="is_paid" id="is_paid" required>
                            <option value="">Выберете вариант</option>
                            <option value="1">Да</option>
                            <option value="0">Нет</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col mt-3">
                <input type="submit" name="add_order" class="btn btn-dark" value="Добавить заказ" id="addOrder">
            </div>
        </form>
    </section>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/layouts/footer.php'; ?>