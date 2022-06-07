$(document).ready(function () {

    let $totalPrice = $('#total-price');
    let $minus = $('.minus');
    let $plus = $('.plus');

    let totalPrice = 0;
    let orderElements = new Map();

    $('.count').on('change', function () {
        let price = +this.getAttribute('data-price');
        let id = +this.getAttribute('data-id');
        let count = +this.value;
        if (count < 0) {
            this.value = 0;
            totalPrice -= this.oldValue * price;
        } else {

            totalPrice -= this.oldValue * price;
            totalPrice += count * price;

            orderElements.set(id, count);
        }
        $totalPrice.attr('value', totalPrice);
        $totalPrice.val(totalPrice);
    });


    function calcPriceByArrow(elem) {
        let price = +elem.getAttribute('data-price');
        let id = +elem.getAttribute('data-id');
        let count = +elem.value;
        if (count < 0) {
            elem.value = 0;
            totalPrice -= elem.oldValue * price;
        } else {

            if (!elem.oldValue) {
                elem.oldValue = count - 1;
                totalPrice -= elem.oldValue * price;
                elem.oldValue = count;
            } else {
                totalPrice -= elem.oldValue * price;
                elem.oldValue = count;
            }

            totalPrice += count * price;
            orderElements.set(id, count);
        }
        $totalPrice.attr('value', totalPrice);
        $totalPrice.val(totalPrice);
    }

    $minus.on('click', function () {
        this.nextElementSibling.stepDown();
        let elem = this.nextElementSibling;
        calcPriceByArrow(elem);
    });

    $plus.on('click', function () {
        this.previousElementSibling.stepUp()
        let elem = this.previousElementSibling;
        calcPriceByArrow(elem);
    });



    $('#make-bouquet-form').on('beforeSubmit', function () {
        let formData = new FormData(this);

        const keys = [...orderElements.keys()];
        formData.append('orderElementsKeys', keys);
        
        const values = [...orderElements.values()];
        formData.append('orderElementsValues', values);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: "make",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
            success: function () {
                return;
            }
        });
    })



});