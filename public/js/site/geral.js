$(document).ready(function () {
    $('.dropdown-submenu > a').on("click", function(e) {
        var submenu = $(this);
        $('.dropdown-submenu .dropdown-menu').removeClass('show');
        submenu.next('.dropdown-menu').addClass('show');
        e.stopPropagation();
    });

    $('.dropdown').on("hidden.bs.dropdown", function() {
        // hide any open menus when parent closes
        $('.dropdown-menu.show').removeClass('show');
    });

    $(".ct-menu").click(function(){
        $(".subct-menu").fadeOut();
        var ct = this.id;
        ct = ct.replace('ct-','');
        $("#subct-"+ct).fadeIn();
        console.log(ct);
    });
})