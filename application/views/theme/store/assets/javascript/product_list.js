$(document).ready(function() {
    get_list_product();
});

function get_list_product() {

    $('#tbl_master_product').dynatable({
        dataset: {
            ajax: true,
            ajaxMethod: 'POST',
            ajaxUrl: base_url + '/store/product/getListRecord',
            ajaxOnLoad: true,
            records: []
        }
    });
}


// delete
$("#btn_delete").on("click", function(event) {
//    event.preventDefault();
//    var selected = $("#tbl_master_product").find("[name]:checked").length;
//    delete_selector(this, selected);
});
      