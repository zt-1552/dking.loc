$(function () {

    $('.nav-sidebar a').each(function () {

        let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
        let link = this.href;

        if (link == location){
            $('.nav-sidebar a').removeClass('active')
            $(this).addClass('active');
            $(this).closest('.treeview').addClass('menu-is-opening menu-open');
            $(this).closest('.nav-treeview').css('display', 'block');
        }
    })

    function clearValues(){
            let values = $('.hidden-value').map(function() { return $(this).val(); }).get();
            let delempty = values.filter(Number);
            let values_str = delempty.join();
            $('#product-productvaluesnew').val(values_str);
            // console.log(values);
            // console.log(delempty);
        $('.hidden-value').on('change', function () {
            let values = $('.hidden-value').map(function() { return $(this).val(); }).get();
            let delempty = values.filter(Number);
            let values_str = delempty.join();
            $('#product-productvaluesnew').val(values_str);
            // console.log(values);
            // console.log(delempty);
        })
    }

    $('#product-category_id').on("change", function() {
        var category_id = $('#product-category_id').val();
        if (!category_id) {
            return;
        }
        // console.log(category_id);
        $.ajax({
            url: 'product/ajax-attr-values',
            type: 'post',
            data: {category_id: category_id},
            success: function (data) {
                if(!data) alert('не добавлен, ошибка');
                $('#ajax-attr-values').html(data);
                clearValues();
            },
            error: function (data) {
                // alert(data.errors);
                console.log(data.errors)
            }
        });
    });



    $('.hidden-value').on('change', function () {
        let values = $('.hidden-value').map(function() { return $(this).val(); }).get();
        let delempty = values.filter(Number);
        let values_str = delempty.join();
        $('#product-productvaluesnew').val(values_str);
        // console.log(values);
        // console.log(delempty);
    })



})