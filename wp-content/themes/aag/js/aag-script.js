$(document).ready(function () {
    /*sub menu*/
    $("#menu div ul li:has(ul)").addClass('dropdown-submenu dropdown').children('a').removeAttr().attr({
        "d":"dLabel" ,
        "ole":"button" ,
        "ata-toggle":"dropdown",
        "lass":"btn btn-primary" ,
        "ata-target":"#"
    });
    $("#menu div ul li:has(ul)").attr({
        "id":"dLabel",
        "role":"button",
        "data-toggle":"dropdown",
        "data-target":"#"
    });
    $("#menu div ul li:has(ul)").children('ul').attr({
        "role":"menu",
        "aria-labelledby":"dropdownMenu"
    }).addClass('dropdown-menu multi-level').removeClass('sub-menu');
    $("li").closest('.header_navbar').children().addClass('general_li');



})

