// active menu
controller = url.split('.')[0];
console.log(controller);
$("li." + controller).children('ul').css('display', 'block');
$("li." + controller).find('a:first').addClass('active-background');
$("." + url.split('.').join('-')).addClass('active');

//tag
$("#tag").select2({
    tags: true
});