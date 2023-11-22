// add-category-btn
$(document).on("click", "#add-category-btn", function () {
    console.log("click");
    $("#add-category").modal("show");
});
//submit create category
$(document).on("submit", "#create-category-form", function (e) {
    e.preventDefault();
    // Get the form data
    var formData = $(this).serialize();
    $.ajax({
        url: "/create-category",
        type: "post",
        data: formData,
        success: function (res) {
            // Reset the form
            $("#create-category-form")[0].reset();
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
                $("#add-category").modal("hide");
                $("#all-data").load(window.location.href + " #all-data");
            } else {
                $("#error-modal").modal("show");
                $("#error-message").html(res.error);
            }
            // If you want to hide a success message after 1.5 seconds, uncomment the following lines
            setTimeout(function () {
                $("#success-modal").modal("hide");
                $("#error-modal").modal("hide");
            }, 2000);
        },
        error: function (xhr, status, error) {
            // If you want to handle errors and display error messages, uncomment the following lines
            var errors = xhr.responseJSON.errors;
            var errorString = "";
            $.each(errors, function (key, value) {
                errorString += value + "<br>";
            });
            $("#error-modal").modal("show");
            $("#error-message").html(errorString);
            setTimeout(function () {
                $("#error-modal").modal("hide");
            }, 2000);
        },
    });
});

// add-category-btn
$(document).on("click", "#add-cake-btn", function () {
    console.log("click");
    $("#add-cake").modal("show");
});
//submit create cake
$(document).on("submit", "#add-cake-form", function (e) {
    e.preventDefault();
    // Get the form data
    var formData = new FormData(this);
    $.ajax({
        url: "/add-cake",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            // Reset the form
            $("#add-cake-form")[0].reset();
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
                $("#add-cake").modal("hide");
                $("#all-data").load(window.location.href + " #all-data");
            } else {
                $("#error-modal").modal("show");
                $("#error-message").html(res.error);
            }
            // If you want to hide a success message after 1.5 seconds, uncomment the following lines
            setTimeout(function () {
                $("#success-modal").modal("hide");
                $("#error-modal").modal("hide");
            }, 2000);
        },
        error: function (xhr, status, error) {
            // If you want to handle errors and display error messages, uncomment the following lines
            var errors = xhr.responseJSON.errors;
            var errorString = "";
            $.each(errors, function (key, value) {
                errorString += value + "<br>";
            });
            $("#error-modal").modal("show");
            $("#error-message").html(errorString);
            setTimeout(function () {
                $("#error-modal").modal("hide");
            }, 2000);
        },
    });
});

// filter category
$(document).on("click", "#category_select", function () {
    var category = $(this).data("value");
    console.log(category);
    $.ajax({
        url: "/cake",
        method: "get",
        data: { category: category },
        success: function (res) {
            $("#all-data").html($(res).find("#all-data").html());
        },
    });
});
// add-stock
$(document).on("click", ".btn-stock", function () {
    var id = $(this).val();
    $("#add-stock").modal("show");
    console.log(id);
    $.ajax({
        url: "/edit-stock",
        data: { id: id },
        type: "get",
        success: function (res) {
            $("#cake_id").val(res.cake.id);
            $("#beginning_stock").val(res.cake.stock);

            var value = 0; // Initialize value to 0

            // Function to update #all_stock
            function updateAllStock() {
                // Use parseFloat to handle cases where res.cake.stock is a string
                var currentStock = parseFloat(res.cake.stock) || 0;
                $("#ending_stock").val(currentStock + value);
            }

            $("#stock").on("input", function (e) {
                value = parseInt(e.target.value) || 0; // Parse the value as an integer or default to 0
                updateAllStock(); // Call a function to update #all_stock
            });

            // Initial update
            updateAllStock();
        },
    });
});
// update-stock
$(document).on("submit", "#add-stock-form", function (e) {
    e.preventDefault();
    // Get the form data
    var formData = $(this).serialize();
    $.ajax({
        url: "/add-stock",
        type: "post",
        data: formData,
        success: function (res) {
            // Reset the form
            $("#add-stock-form")[0].reset();
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
                $("#add-stock").modal("hide");
                $("#all-data").load(window.location.href + " #all-data");
            } else {
                $("#error-modal").modal("show");
                $("#error-message").html(res.error);
            }
            // If you want to hide a success message after 1.5 seconds, uncomment the following lines
            setTimeout(function () {
                $("#success-modal").modal("hide");
                $("#error-modal").modal("hide");
            }, 2000);
        },
        error: function (xhr, status, error) {
            // If you want to handle errors and display error messages, uncomment the following lines
            var errors = xhr.responseJSON.errors;
            var errorString = "";
            $.each(errors, function (key, value) {
                errorString += value + "<br>";
            });
            $("#error-modal").modal("show");
            $("#error-message").html(errorString);
            setTimeout(function () {
                $("#error-modal").modal("hide");
            }, 2000);
        },
    });
});
