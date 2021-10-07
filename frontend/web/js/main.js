
$(document).ready(function()
{

    // $('#CartModal').on('shown.bs.modal', function () {
    //     $('#CartModal').trigger('focus')
    // })

    function showCart(cart) {
        $('#CartModal .modal-body').html(cart);
        $('#CartModal').modal();

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
            },
            error: function () {
                alert('Ошибка');
            }
        })
        return false;
    })


});