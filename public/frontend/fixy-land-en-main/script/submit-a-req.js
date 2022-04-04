// JavaScript Document


$(document).ready(function () {

    //menu items selection on hover
    let sub_menu_hover2 = $(".sub-menu-hover2");
    let sub_menu_hover2_div = $(".sub-menu-hover2 div");
    let details = $(".details");

    for (let i = 0; i < sub_menu_hover2.length; i++) {
        $(sub_menu_hover2[i]).click(function () {
            for (let j = 0; j < sub_menu_hover2.length; j++) {
                $(details[j]).addClass("d-none");
                $(sub_menu_hover2_div[j]).removeClass("darkYellow");
            }
            $(details[i]).removeClass("d-none");
            $(sub_menu_hover2_div[i]).addClass("darkYellow");

        })
    }



    //custom or automatic time selection
    $("select.aut-time-pick").change(function () {
        var selected_option = $(this).children("option:selected").val();
        if (selected_option == "custom") {
            $("#time-picker").removeClass("d-none");
        } else { $("#time-picker").addClass("d-none"); }
    });




    //custom or automatic addrs selection	
    $(".saved_addr input[name=addr-radio]").change(function () {
        var selected_option = $('input[name=addr-radio]:checked').attr("id");
        if (selected_option == "custom_addr_selection") {
            $("#add_new_addrs").removeClass("d-none");
        } else { $("#add_new_addrs").addClass("d-none"); }
    });



})



//upload picture
var output = document.getElementById('output_img');
output.classList.add("d-none");
var remove_output = document.getElementById('remove_img');
remove_output.classList.add("d-none");

var loadFile = function (event) {
    output.src = URL.createObjectURL(event.target.files[0]);
    output.classList.remove("d-none");
    remove_output.classList.remove("d-none");
    output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
    }
};

function remove_picture() {
    var output = document.getElementById('output_img');
    output.src = "";
    remove_output.classList.add("d-none");
    output.classList.add("d-none");
}