;(function () {
    console.log('Purchase.');
    let isSend = false;

    let userId =

    function totalPrice() {
        let total = 0;
        $('.table tbody tr').each(function () {
            let p = $('td.price',this).get(0);
            if(p) total += parseInt(p.innerText);
        });

        $('.table tfoot .total').html(total);
    }

    Date.prototype.toDateInputValue = (function() {
        let local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0,16);
    });

    $('#product-datetime').val(new Date().toDateInputValue());

    $('#product-name').on('input', function() {
        let opt = $('option[value="' + $(this).val() + '"]');
        this.setAttribute('data-id', opt.data('id'));
    });

    $('.add-button > button').click(function () {
        if(!isSend) {
            let name = $('#product-name').val();

            let data = {
                datetime: $('#product-datetime').val(),
                productId: parseInt($('#product-name').attr('data-id')),
                price: $('#product-price').val(),
                user: $('#product-user').val(),
            };

            if(!data.datetime) {
                $('#product-datetime').focus();
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
                url: "/purchase/add-product-ajax",
                data: data
            }).done(function(msg) {
                console.log( msg );

                let l = $('.table tbody tr').length;

                let tr = "<tr data-id='" + data.productId + "'>"
                        +"<th>" + (l + 1) + "</th>"
                        +"<td>" + "</td>"
                        +"<td>" + name + "</td>"
                        +"<td class='price'>" + data.price + "</td>"
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