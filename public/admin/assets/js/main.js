$('.menu__list li.has-child > a .icon').click(function (e) {
    e.preventDefault();
    $(this).parent().parent().toggleClass('menu-open');
});

