$('#search_itms').keyup(function () {
    search_items();
});

$('.model_btn').click(function () {
    get_selected_item_details($(this).attr('rel'));
});

//==============================================================================

function get_selected_item_details(item_id) {
    var dataArray = {action: "get_selected_item_details", item_id: item_id}
    $.post("./models/items_model.php", dataArray, function (reply) {
        $.each(reply, function (index, value) {
            $('#item_img').attr('src', '../wdrms/others/uploads/' + value.photo);
            $('#itm_name').html(value.item_name);
            $('#itm_price').html('Rent Price - Rs. '+value.item_rent_price);
            $('#keeping_details').html('Keeping Days. '+value.item_keep_days);
            $('#avl_qty').html('Available Qty. '+value.qty);
        });
    }, 'json');
}

function search_items() {
    var search_type = $('#itm_type').val();
    var search_value = $('#search_itms').val();
    var dataArray = {action: "search_items", search_type: search_type, search_value: search_value}
    $.post("./models/items_model.php", dataArray, function (reply) {
        $('#itm_section').html('').append(reply);
    });
}



