/**
 * Created by narek on 24.06.2017.
 */
$(document).ready(function () {
/*sub menu*/
$( "#menu div ul li:has(ul)").addClass('dropdown').children('a').removeAttr().attr({
    "class":"dropdown-toggle",
    "data-toggle":"dropdown",
    "role":"button",
    "aria-haspopup":"true",
    "aria-expanded":"false"
})
    $( "#menu div ul li:has(ul)").children('ul').addClass('dropdown-menu').removeClass('sub-menu')


})

