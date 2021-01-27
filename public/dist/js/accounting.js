var i = 0;
$(document).ready(function () {

    $('body').on("click", ".delete-confirm", function (event) {
        event.preventDefault();
        var href = $(this).attr('href');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this record!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                url: href,
                method: 'GET',
                success: function (result) {
                    swal({
                        title: 'Deleted!',
                        text: 'Deleted Successfully',
                        type: 'success'
                    }, function () {
                        window.location.reload();
                    });
                }
            });
        });
    });

    $('.datepicker').datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    $('body').on('click', '.add-stock-row', function (e) {
        e.preventDefault();
        var id = $(this).closest('.row').find('.stock_product').val();

        $.ajax({
            url: path+'/accounting/products/getStockProductsHtml/' + id,
            type: 'GET',
            dataType: "json",
            success: function (data) {
                $('.products_list tbody').append('<tr><td><input type="hidden" name="items[' + i + '][product_id]" value="' + data[0].id + '">' + data[0].product_name + '<input type="hidden" name="items[' + i + '][cost_price]" value="' + data[0].purchase_price + '"><input type="hidden" name="items[' + i + '][sale_price]" value="' + data[0].sale_price + '"></td><td>' + data[0].code + '</td><td><input type="hidden" name="items[' + i + '][unit_id]" value="' + data[0].unit_id + '">' + data[0].unit + '</td><td class="cost_price">' + data[0].purchase_price + '</td><td class="sale_price">' + data[0].sale_price + '</td><td><input type="text" class="form-control expected_qty" readonly="true" name="expected_qty" value="' + data[0].unit_stock + '"></td> <td><input type="number" class="form-control counted_qty" name="counted_qty" value=""></td><td class="difference"></td><td class="cost_sum"></td> <td class="sale_sum"></td><td><a href="#" class="btn btn-danger remove-stock-row"><i class="fa fa-minus"></i></a></td> </tr>');
                i++;
                StockCalculation();

            },
        });
    });
    $('body').on('click', '.remove-stock-row', function (e) {
        e.preventDefault();
        $(this).closest('tr').remove();
        StockCalculation();
    });

});

function StockCalculation() {
    var more_difference = 0;
    var less_difference = 0;
    var more_cost = 0;
    var less_cost = 0;
    var more_sale = 0;
    var less_sale = 0;
    var total_expected = 0;
    var total_counted = 0;
    $('.stock-items tbody tr').each(function (i) {
        var expected = $(this).find('.expected_qty').val();
        expected = (expected) ? parseFloat(expected) : 0;
        var counted = $(this).find('.counted_qty').val();
        total_expected += expected;
        if (counted) {
            counted = (counted) ? parseFloat(counted) : 0;
            total_counted += counted;
            var difference = counted - expected;
            if (difference > 0)
                more_difference += difference;
            else
                less_difference -= difference;
            difference = (difference > 0) ? '+' + difference : difference;
            $(this).find('.difference').text(difference);
            var cost_price = $(this).find('.cost_price').text();
            cost_price = (cost_price) ? parseFloat(cost_price) : 0;
            var sale_price = $(this).find('.sale_price').text();
            sale_price = (sale_price) ? parseFloat(sale_price) : 0;
            var cost_sum = difference * cost_price;
            var sale_sum = difference * sale_price;
            if (cost_sum > 0)
                more_cost += cost_sum;
            else
                less_cost -= cost_sum;

            if (sale_sum > 0)
                more_sale += sale_sum;
            else
                less_sale -= sale_sum;
            cost_sum = (cost_sum > 0) ? '+' + cost_sum : cost_sum;
            sale_sum = (sale_sum > 0) ? '+' + sale_sum : sale_sum;
            $(this).find('.cost_sum').text(cost_sum);
            $(this).find('.sale_sum').text(sale_sum);
        }
    });
    $('.more_qty').text(more_difference);
    $('.less_qty').text(less_difference);
    $('.more_sale').text(more_sale);
    $('.more_cost').text(more_cost);
    $('.less_cost').text(less_cost);
    $('.less_sale').text(less_sale);
    $('.total_difference').text((more_difference - less_difference));
    $('.total_cost_price').text((more_cost - less_cost));
    $('.total_sale_price').text((more_sale - less_sale));
}

$('body').on('keyup blur', '.stock-items .counted_qty', function (e) {
    StockCalculation();
});

$('body').on('click', '.show-all-product', function (e) {
    e.preventDefault();
    var date = $(this).closest('.row').find('.from_date').val();
    $.ajax({
        url: path+'/accounting/products/getAllStockProductsHtml',
        type: 'GET',
        dataType: "json",
        success: function (data) {
            $('.products_list tbody').append('<tr><td><input type="hidden" name="items[][product_id]" value="' + data[0].id + '">' + data[0].product_name + '<input type="hidden" name="items[][cost_price]" value="' + data[0].purchase_price + '"><input type="hidden" name="items[][sale_price]" value="' + data[0].sale_price + '"></td><td>' + data[0].code + '</td><td><input type="hidden" name="items[0][unit_id]" value="`````````````````````' + data[0].unit + '-\\\--0 ">' + data[0].unit + '</td><td class="cost_price">' + data[0].purchase_price + '</td><td class="sale_price">' + data[0].sale_price + '</td><td><input type="text" class="form-control expected_qty" readonly="true" name="expected_qty" value="' + data[0].quantity + '"></td> <td><input type="number" class="form-control counted_qty" name="counted_qty" value=""></td><td class="difference"></td><td class="cost_sum"></td> <td class="sale_sum"></td><td><a href="#" class="btn btn-danger remove-stock-row"><i class="fa fa-minus"></i></a></td> </tr>');
            StockCalculation();

        },
    });
});

