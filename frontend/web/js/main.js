
$(document).ready(function()
{

    // $('#CartModal').on('shown.bs.modal', function () {
    //     $('#CartModal').trigger('focus')
    // })

    function showCart(cart) {
        $('#CartModal .modal-body').html(cart);
        $('#CartModal').modal();
        // showCartHead();
    }

    function showCartHead() {
        let cartSum = $('#cart-sum').text() ? '$ ' + $('#cart-sum').text() : '$ 0';
        let cartQty = $('#cart-qty').text() ? $('#cart-qty').text() : '$ 0';
        if (cartSum) {
            $('.cart-sum').text(cartSum);
            // console.log(cartSum);
        }
        if (cartQty) {
            $('.cart-qty').text(cartQty);
            // console.log(cartSum);
        }
    }

    /* Cart    */
    $('.add_to_cart').on('click', function () {
        let id = $(this).data('id');
        $.ajax({
            url: 'cart/add',
            data: {id: id},
            type: 'GET',
            success: function (res) {
                if(!res) alert('Товар не добавлен, ошибка');
                showCart(res);
                showCartHead();
            },
            error: function () {
                alert('Ошибка');
            }
        })
        return false;
    })

    $('#cart_container').on('click', function () {
        $.ajax({
            url: 'cart/show',
            type: 'GET',
            success: function (res) {
                if(!res) alert('Товар не добавлен, ошибка');
                showCart(res);
            },
            error: function () {
                alert('Ошибка');
            }
        })
        return false;
    })





});