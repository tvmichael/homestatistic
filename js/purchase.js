;(function () {
    console.log('Purchase.');
    let isSend = false;

    function totalPrice() {
        let total = 0;
        $('.table tbody tr').each(function () {
            total += parseInt($('td',this).get(1).innerText);
        });

        $('.table tfoot .total').html(total);
    }

    Date.prototype.toDateInputValue = (function() {
        let local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0,10);
    });

    $('#product-date').val(new Date().toDateInputValue());

    $('#product-name').on('input',function() {
        let opt = $('option[value="' + $(this).val() + '"]');
        this.setAttribute('data-id', opt.data('id'));
    });

    $('.add-button > button').click(function () {
        if(!isSend) {
            let name = $('#product-name').val();

            let data = {
                date: $('#product-date').val(),
                productId: parseInt($('#product-name').attr('data-id')),
                price: $('#product-price').val()
            };

            if(!data.date) {
                $('#product-date').focus();
                return;
            }

            if(!data.productId) {
                $('#product-name').focus();
                return;
            }

            if(!data.price) {
                $('#product-price').focus();
                return;
            }

            isSend = true;
            $.ajax({
                method: "POST",
                url: "/site/purchase-add-product-ajax",
                data: data
            }).done(function(msg) {
                console.log( msg );

                let l = $('.table tbody tr').length;

                let tr = "<tr data-id='" + data.productId + "'>"
                        +"<th scope='row'>" + (l + 1) + "</th>"
                        +"<td>" + name + "</td>"
                        +"<td>" + data.price + "</td>"
                    +"</tr>";

                $('.table tbody').prepend(tr);

                $('#product-price').val('');
                $('#product-name').val('');

                totalPrice();

                isSend = false;
            }).fail(function( jqXHR, textStatus ) {
                isSend = false;
                console.log( "Request failed: " + textStatus );
            });
        }
    });

    totalPrice();
})();