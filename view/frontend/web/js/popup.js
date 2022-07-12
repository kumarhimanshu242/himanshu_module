$(function () {
    var container = $('<div id="container"></div>');
    container.show();
    container.appendTo(document.body);
    $('.popupbox').show();
    $('.close').click(function () {
        $('.popupbox').hide();
        container.appendTo(document.body).remove();
        return false;
    });
    $('.close').click(function () {
        $('.popupbox').hide();
        container.appendTo(document.body).remove();
        return false;
    });
});
