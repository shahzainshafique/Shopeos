$(document).ready(function () {
    $(".addToCartBtn").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();
        var product_qtv = $(this)
            .closest(".product_data")
            .find(".qtv-input")
            .val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            method: "Post",

            url: "/add-to-cart",

            data: {
                product_id: product_id,
                product_qtv: product_qtv,
            },
            success: function (response) {
                swal(response.status);
            },
        });
    });

    $(".Increment-btn").click(function (e) {
        e.preventDefault();

        var int_Value = $(this)
            .closest(".product_data")
            .find(".qtv-input")
            .val();
        var value = parseInt(int_Value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 11) {
            value++;
            $(this).closest(".product_data").find(".qtv-input").val(value);
        }
    });
    $(".decrement-btn").click(function (e) {
        e.preventDefault();

        var dec_Value = $(this)
            .closest(".product_data")
            .find(".qtv-input")
            .val();
        var value = parseInt(dec_Value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            var dec_Value = $(this)
                .closest(".product_data")
                .find(".qtv-input")
                .val(value);
        }
    });
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(".delete-cart-item").click(function (e) {
        e.preventDefault();

        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        $.ajax({
            method: "post",

            url: "delete-cart-item",

            data: {
                prod_id: prod_id,
            },
            success: function (response) {
                setTimeout(function () {
                    location.reload(true);
                }, 1000);
                swal("", response.status, "success");
            },
        });
    });
    $(".changeQuantity").click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        var qty = $(this).closest(".product_data").find(".qtv-input").val();
        data = { prod_id: prod_id, prod_qtv: qty };
        $.ajax({
            method: "POST",

            url: "update-cart",

            data: data,
            success: function (response) {
                window.location.reload();
            },
        });
    });
});
