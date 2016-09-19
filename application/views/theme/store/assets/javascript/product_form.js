$(".control_attribute_detail").on("click", function() {
    var $control_attribute_detail = $(this);
    var $panel_attribute = $control_attribute_detail.parents('.panel_attribute');

    $panel_attribute.find('input[type="radio"]').each(function() {
        if($control_attribute_detail.val() != $(this).val()) {
            $(this).prop('checked', false);
        }
    });
});

$(".control_attribute").on("click", function() {
    var $control_attribute = $(this);
    var $panel_attribute = $control_attribute.parents('.panel_attribute');

    if($control_attribute.prop('checked')) {
        $panel_attribute.find('input[type="radio"]').each(function() {
            $(this).removeAttr('disabled');
        });
    } else {
        $panel_attribute.find('input[type="radio"]').each(function() {
            $(this).prop('disabled', true);
            $(this).prop('checked', false);
        });
    }
});


$("#btn_add_conbination").on("click", function() {
    var html = '';
    var input = '';
    var reference = $("#input_reference").val();
    var ean = $("#input_ean").val();
    var price = $("#input_price").val();
    var quantity = $("#input_quantity").val();
    var $list_combination = $("#input_list_combination");
    var index_list = $list_combination.find('div').length + 1;

    $(".panel_attribute").each(function() { // panel attribute

        var attribute_name = '';
        var attribute_detail_id = '';
        var attr_value_name = '';

        var $panel_attribute = $(this);
        var $checkbox_attribute = $panel_attribute.find("input[type=checkbox]");
        var $radio_attribute = $panel_attribute.find("input[type=radio]");

        if($checkbox_attribute.prop('checked')) { // attribute group

            attribute_name = $checkbox_attribute.attr('text'); // attribute name
            $radio_attribute.each(function() { // attribute value loop
                if($(this).prop('checked')) {
                    attribute_detail_id = $(this).val();
                    attr_value_name = $(this).attr('text');
                    input += '<input type="hidden" name="combination[' + index_list + '][attribute][]" value="' + attribute_detail_id + '">';
                }
            });
        }
    });
    
    $(".panel_image").find("input[type='checkbox']").each(function(){
        if($(this).prop('checked')){
            input += '<input type="hidden" name="combination[' + index_list + '][product_image][]" value="' + $(this).val() + '">';
        }
    });
    

    var text = 'Ref : ' + reference + '  - Price : ' + price + ' - Qty ' + quantity;

    //input += '<input type="hidden" name="data[' + index_list + '][attribute][]" value="' + groupid + '">';
    input += '<input type="hidden" name="combination[' + index_list + '][reference]" value="' + reference + '">';
    input += '<input type="hidden" name="combination[' + index_list + '][ean]" value="' + ean + '">';
    input += '<input type="hidden" name="combination[' + index_list + '][price]" value="' + price + '">';
    input += '<input type="hidden" name="combination[' + index_list + '][quantity]" value="' + quantity + '">';


    html += '<div>';
    html += '<button class="list-group-item">' + text + '</button>';
    html += input;
    html += '</div>';

    $list_combination.append(html);

});

$("#btn_del_combinaion").on("click", function() {

});

$("#btn_upload_image").on("click", function() {
    var id_product = $("#input_id_product").val() || '';
    

    var formData = new FormData();
    formData.append('userfile', $('#input_image')[0].files[0]);
    
    //console.log(formData); return;

    $.ajax({
        type: 'POST',
        url: base_url + '/store/product/uploadImage/' + id_product,
        data: formData,
        fileElementId: 'userfile',
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
        success: function(data) {
            console.log(data);
            //alert(data);
        }
    });
});


// save
$("#btn_save,#btn_save_stay").on("click", function(event) {
    event.preventDefault();

    save_selector(this);
//    var status_required = check_required();
//    var count_detail = check_detail("tbl_detail_detail");
//
//    if(status_required == 1 && count_detail != 0) {
//        save_selector(this);
//    }
});
