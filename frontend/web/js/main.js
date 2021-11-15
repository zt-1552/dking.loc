
$(document).ready(function()
{
    /* Cart    */
    function showCart(cart) {
        $('#CartModal .modal-body').html(cart);
        $('#CartModal').modal();
        // showCartHead();
    }

    function showCartHead() {
        let cartSum = $('#cart-sum').text() ? '$ ' + $('#cart-sum').text() : '$ 0';
        let cartQty = $('#cart-qty').text() ? $('#cart-qty').text() : '0';
        if (cartSum) {
            $('.cart-sum').text(cartSum);
            // console.log(cartSum);
        }
        if (cartQty) {
            $('.cart-qty').text(cartQty);
            // console.log(cartSum);
        }
    }

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

    $('#CartModal .modal-body').on('click', '.del-item-cart', function () {
        let id = $(this).data('id');
        $.ajax({
            url: 'cart/del-item',
            data: {id: id},
            type: 'GET',
            success: function (res) {
                if(!res) alert('Товар не удален, ошибка');
                showCart(res);
                showCartHead();
            },
            error: function () {
                alert('Ошибка');
            }
        })
        return false;
    })

    $('#clean').on('click', function () {
        $.ajax({
            url: 'cart/clean-cart',
            type: 'GET',
            success: function (res) {
                if(!res) alert('Корзина не очищена, ошибка');
                showCart(res);
                showCartHead();
            },
            error: function () {
                alert('Ошибка');
            }
        })
        return false;
    })

    $('button.change-qty').on('click', function () {
        let id = $(this).data('id'),
            qty = $(this).data('qty');
        $('button.change-qty').attr('disabled');
        $.ajax({
            url: 'cart/change-cart',
            data:
                {id: id,
                qty: qty},
            type: 'GET',
            success: function (res) {
                if(!res) alert('Ошибка qty');
                location = 'cart/checkout';
                $('button.change-qty').removeAttr('disabled');
            },
            error: function () {
                alert('Ошибка');
            }
        })
        return false;
    })

    /* Form login / register    */

    $('.top_bar_user a[href="#register"]').on('click', function (e) {
        e.preventDefault();
        $('.nav-item a[href="#login"]').removeClass('active');
        $('#login').removeClass('active');
        $('.nav-item a[href="#register"]').addClass('active');
        $('#register').addClass('active');
    })

    $('.top_bar_user a[href="#login"]').on('click', function () {
        $('.nav-item a[href="#register"]').removeClass('active');
        $('#register').removeClass('active');
        $('.nav-item a[href="#login"]').addClass('active');
        $('#login').addClass('active');
    })



});