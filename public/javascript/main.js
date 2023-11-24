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
// filter page
$(document).on("change", "#cake_page", function () {
    var cake_page = $(this).val();
    console.log(cake_page);
    $.ajax({
        url: "/cake",
        method: "get",
        data: { cake_page: cake_page },
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
// info cake
$(document).on("click", ".info-cake-btn", function () {
    console.log("click");
    var id = $(this).val();
    $("#info-cake").modal("show");
    $.ajax({
        url: "/cake-info",
        type: "get",
        data: { id: id },
        success: function (res) {
            var data = res.cake;
            $("#info_cake_category").html(data.category);
            $("#info_cake_price").html(data.price);
            $("#info_cake_stock").html(data.stock);
            $("#info_cake_image").attr("src", data.image);
        },
    });
});
// edit cake
$(document).on("click", ".edit-cake-btn", function () {
    console.log("click");
    var id = $(this).val();
    $("#update-cake").modal("show");
    $.ajax({
        url: "/cake-info",
        type: "get",
        data: { id: id },
        success: function (res) {
            var data = res.cake;
            $("#update_cake_id").val(id);
            $("#update_category").val(data.category);
            $("#update_price").val(data.price);
            // Assuming you have the initial value of data.image
            var initialImageUrl = data.image;

            // Set the initial value
            $("#update_image_preview").attr("src", initialImageUrl);

            // Add an event listener for changes
            var imageInput = $("#update_image");

            imageInput.on("change", function () {
                var imageUrl = URL.createObjectURL(this.files[0]);
                $("#update_image_preview").attr("src", imageUrl);
            });
        },
    });
});
//submit update cake
$(document).on("submit", "#update-cake-form", function (e) {
    e.preventDefault();
    // Get the form data
    var formData = new FormData(this);
    $.ajax({
        url: "/update-cake",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            // Reset the form
            $("#update-cake-form")[0].reset();
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
                $("#update-cake").modal("hide");
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

// User Cake

// filter cake category (user)
$(document).on("change", "#filter-cake-category", function () {
    var cake_category = $(this).val();
    console.log(cake_category);
    $.ajax({
        url: "/",
        data: { cake_category: cake_category },
        type: "GET",
        success: function (res) {
            console.log(res);
            $("#cake-section").html($(res).find("#cake-section").html());
        },
    });
});
$(document).on("change", "#filter-cake-category-user", function () {
    var cake_category = $(this).val();
    console.log(cake_category);
    $.ajax({
        url: "/dashboard",
        data: { cake_category: cake_category },
        type: "GET",
        success: function (res) {
            console.log(res);
            $("#cake-section").html($(res).find("#cake-section").html());
        },
    });
});
//submit add cart
$(document).on("submit", "#add-cart-form", function (e) {
    e.preventDefault();
    // Get the form data
    var formData = $(this).serialize();
    $.ajax({
        url: "/add-cart",
        type: "post",
        data: formData,
        success: function (res) {
            // Reset the form
            $("#add-cart-form")[0].reset();
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
                $("#navBar").load(window.location.href + " #navBar");
            } else {
                $("#error-modal").modal("show");
                $("#error-message").html(res.error);
            }
            // If you want to hide a success message after 2 seconds, uncomment the following lines
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
// change the quantity
$(document).on("change", "#cart-quantity", function (e) {
    var quantity = $(this).val();
    var id = $(this).data("id");
    var priceElement = $(this).closest(".card-body").find("#cart-price"); // Select the price element

    $.ajax({
        url: "/add-quantity",
        data: { quantity: quantity, id: id },
        type: "get",
        success: function (res) {
            console.log(res);
            priceElement.text("P" + res.price);
            $("#total-price").html(res.total);
        },
    });
});
// delete from cart
$(document).on("click", ".remove-cart", function () {
    var id = $(this).val();
    if (confirm("Remove item from cart?")) {
        $.ajax({
            url: "/remove-cart",
            data: { id: id },
            type: "get",
            success: function (res) {
                // Reset the form
                if (res.success) {
                    $("#success-modal").modal("show");
                    $("#success-message").html(res.success);
                } else {
                    $("#error-modal").modal("show");
                    $("#error-message").html(res.error);
                    $("#cart-section").load(
                        window.location.href + " #cart-section"
                    );
                }
                // If you want to hide a success message after 1.5 seconds, uncomment the following lines
                setTimeout(function () {
                    $("#success-modal").modal("hide");
                    $("#error-modal").modal("hide");
                }, 2000);
            },
        });
    }
});

// admin cater

// add-package
$(document).on("click", "#add-package-btn", function () {
    $("#add-package").modal("show");
    // Counter for dynamic ID generation
    let inclusionCount = 1;
    // Add Inclusion button click event
    $("#add-inclusion").on("click", function (e) {
        e.preventDefault();
        inclusionCount++;

        // Clone the original inclusion input and update attributes
        let newInclusionInput = $("#inclusion1").clone();
        newInclusionInput
            .attr({
                id: "inclusion" + inclusionCount,
                name: "inclusion[]",
            })
            .val("");
        // Create a new div with class "my-1 form-control"
        let newDiv = $("<div>").addClass("mb-2 col-6");
        // Append the new inclusion input to the new div
        newDiv.append(newInclusionInput);

        // Append the new inclusion input to the container
        $("#inc-container").append(newDiv);
    });
});
// submit package
$(document).on("submit", "#add-package-form", function (e) {
    e.preventDefault();
    // Get the form data
    var formData = new FormData(this);
    $.ajax({
        url: "/add-package",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            // Reset the form
            $("#add-package-form")[0].reset();
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
                $("#add-package").modal("hide");
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
