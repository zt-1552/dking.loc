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
})