$(function () {
    $('#addNewCustomer').on('click', function () {
        if ($(this).is(':checked')) {
            $('.add-customer-container .inner-container').fadeIn(800, 'linear').addClass('opened');
            $('#surname').prop('required', true);
            $('#name').prop('required', true);

            $('.select-customer-container .inner-container').fadeOut(200).removeClass('opened');
            $('.select-customer-container input:checkbox').prop('checked', false);
            $('.select-customer-container select').val('');
            $('#selectCustomer').prop('required', false);
        } else {
            $('.add-customer-container .inner-container').fadeOut(200).removeClass('opened');
            $('#surname').prop('required', false);
            $('#name').prop('required', false);
            $('#selectCustomer').prop('required', true);
        }
    });

    $('#selectCustomer').on('click', function () {
        if ($(this).is(':checked')) {
            $('.select-customer-container .inner-container').fadeIn(800, 'linear').addClass('opened');

            $('.add-customer-container .inner-container').fadeOut(200).removeClass('opened');
            $('.add-customer-container input:checkbox').prop('checked', false);
            $('#surname').prop('required', false);
            $('#name').prop('required', false);
            $('.add-customer-container input').val('');
            $('#addNewCustomer').prop('required', false);
        } else {
            $('.select-customer-container .inner-container').fadeOut(200).removeClass('opened');

            $('#surname').prop('required', false);
            $('#name').prop('required', false);
            $('#addNewCustomer').prop('required', true);
        }
    });



    $('#addOrder').on('click', function (e) {
        validate();
        preloader(true);

        let button = $(e.target);
        let data = new FormData($('#formAdd')[0]);

        // Данные формы
        let formData = $('#formAdd').serializeArray();
        $.each(formData, function (key, input) {
            data.append(input.name, input.value);

        });
        // Кнопки формы
        data.append(button.attr('name'), button.attr('value'));

        $.ajax({
            type: "POST",
            url: "/services/ajax.php",
            processData: false,
            contentType: false,
            data: data,
            success: function (res) {
                /* нашел случайно баг в firefox который блокирует редирект, но не стал на этом внимание заострять, так как не нашел быстрое решение проблемы*/
                window.location.href = '/';
            }
        });
    });

    function validate() {
        $('input, textarea, select').filter('[required]:visible').each(function () {
            if ($(this).val() == '') {
                throw new Error('Заполните все обязательные поля');
            }
        });
    }

    function preloader(display = true) {
        if (display === true) {
            $('.preloader').removeClass('d-none');
        } else {
            $('.preloader').addClass('d-none');
        }
    }
});