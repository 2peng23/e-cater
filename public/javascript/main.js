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
$(document).on("click", ".delete-cake-btn", function () {
    console.log("click");
    var id = $(this).val();
    if (confirm("Delete this cake?")) {
        $.ajax({
            url: "/delete-cake",
            type: "get",
            data: { id: id },
            success: function (res) {
                if (res.success) {
                    $("#success-modal").modal("show");
                    $("#success-message").html(res.success);
                    $("#all-data").load(window.location.href + " #all-data");
                } else {
                    $("#all-data").load(window.location.href + " #all-data");
                    $("#error-modal").modal("show");
                    $("#error-message").html(res.error);
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
// toggle buttons
$(document).on("mouseover", ".cater-data", function () {
    var buttons = $(this).find(".cater-button");
    buttons.show();
});
$(document).on("mouseout", ".cater-data", function () {
    var buttons = $(this).find(".cater-button");
    buttons.hide();
});
// edit cater package
$(document).on("click", ".cater-edit", function () {
    var id = $(this).val();
    $("#update-package").modal("show");
    console.log(id);
    let inclusionCount = 1;
    // Add Inclusion button click event
    $("#edit_add-inclusion").on("click", function (e) {
        e.preventDefault();
        inclusionCount++;

        // Clone the original inclusion input and update attributes
        let newInclusionInput = $("#edit_inclusion1").clone();
        newInclusionInput
            .attr({
                id: "edit_inclusion" + inclusionCount,
                name: "edit_inclusion[]",
            })
            .val("");
        // Create a new div with class "my-1 form-control"
        let newDiv = $("<div>").addClass("mb-2 col-6");
        // Append the new inclusion input to the new div
        newDiv.append(newInclusionInput);

        // Append the new inclusion input to the container
        $("#edit_inc-container").append(newDiv);
    });
    $.ajax({
        url: "/edit-cater",
        type: "get",
        data: { id: id },
        success: function (res) {
            var data = res.package;
            $("#edit_id").val(id);
            $("#edit_name").val(data.name);
            $("#edit_price").val(data.price);
            var initialImageUrl = data.image;
            // Set the initial value
            $("#update_image_preview").attr("src", initialImageUrl);

            // Add an event listener for changes
            var imageInput = $("#edit_image");

            imageInput.on("change", function () {
                var imageUrl = URL.createObjectURL(this.files[0]);
                $("#update_image_preview").attr("src", imageUrl);
            });
        },
    });
});
//submit update package
$(document).on("submit", "#update-package-form", function (e) {
    e.preventDefault();
    // Get the form data
    var formData = new FormData(this);
    $.ajax({
        url: "/update-package",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            // Reset the form
            $("#update-package-form")[0].reset();
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
                $("#update-package").modal("hide");
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
// delete cater package
$(document).on("click", ".cater-delete", function () {
    var id = $(this).val();
    console.log(id);
    if (confirm("Delete this package?")) {
        $.ajax({
            url: "/delete-cater",
            type: "get",
            data: { id: id },
            success: function (res) {
                if (res.success) {
                    $("#success-modal").modal("show");
                    $("#success-message").html(res.success);
                } else {
                    $("#error-modal").modal("show");
                    $("#error-message").html(res.error);
                    $("#all-data").load(window.location.href + " #all-data");
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
// edit cater inclusion
$(document).on("click", ".cater-edit-inclusion", function () {
    console.log("click");

    // Find the closest <ul> to the clicked button
    var $ul = $(this).closest("p").next("ul");

    // Toggle classes for each <i> element within the <ul>
    $ul.find(".cater-delete-inclusion").toggle();
});
// delete inclusion
$(document).on("click", ".cater-delete-inclusion", function () {
    var id = $(this).val();
    var index = $(this).data("index");
    console.log(index);
    console.log(id);
    $.ajax({
        url: "/delete-inclusion",
        data: {
            id: id,
            index: index,
        },
        type: "get",
        success: function (result) {
            console.log(result);
            if (result.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(result.success);
            } else {
                $("#error-modal").modal("show");
                $("#error-message").html(result.error);
                $("#all-data").load(window.location.href + " #all-data");
            }
            // If you want to hide a success message after 1.5 seconds, uncomment the following lines
            setTimeout(function () {
                $("#success-modal").modal("hide");
                $("#error-modal").modal("hide");
            }, 2000);
        },
    });
});
// add-cater-stock
$(document).on("click", ".add-cater-stock", function () {
    $("#add-cater-stock").modal("show");
    var id = $(this).val();
    $.ajax({
        url: "/edit-cater-stock",
        data: { id: id },
        type: "get",
        success: function (res) {
            console.log(res.cater);
            $("#cater_id").val(id);
            $("#beginning_stock").val(res.cater.quantity);

            var value = 0; // Initialize value to 0

            // Function to update #all_stock
            function updateAllStock() {
                // Use parseFloat to handle cases where res.cake.stock is a string
                var currentStock = parseFloat(res.cater.quantity) || 0;
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
// update-cater--stock
$(document).on("submit", "#add-cater-stock-form", function (e) {
    e.preventDefault();
    // Get the form data
    var formData = $(this).serialize();
    $.ajax({
        url: "/add-cater-stock",
        type: "post",
        data: formData,
        success: function (res) {
            // Reset the form
            $("#add-cater-stock-form")[0].reset();
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
                $("#add-cater-stock").modal("hide");
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

// user cater

$(document).on("click", ".cater-info-btn", function () {
    var id = $(this).val();
    $("#info-cater").offcanvas("show");
    $.ajax({
        url: "/cater-information",
        data: { id: id },
        type: "get",
        success: function (res) {
            console.log(res.cater);
            var data = res.cater;
            $(".package_name").html(data.name);
            // Assuming data.price is a number
            var formattedPrice = new Intl.NumberFormat("en-US", {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2,
            }).format(data.price);

            $("#package_price").html(formattedPrice);

            var inc = data.inclusion;
            var ul = $("#inc-list");

            // Clear the existing content of the ul
            ul.empty();

            // Iterate through the 'inc' array and append each element to the ul
            for (var i = 0; i < inc.length; i++) {
                // Create a new <li> element
                var listItem = $("<li>");
                listItem.addClass("col-6");

                // Set the text content of the <li> to the array element
                listItem.text(inc[i]);

                // Create an <i> element with the specified classes
                var icon = $("<i>").addClass("fa fa-check-circle text-success");

                // Add a space before appending the <i> element to the <li>
                listItem.append(" ").append(icon);

                // Append the list item to the ul
                ul.append(listItem);
            }
        },
    });
});
//submit add cart
$(document).on("submit", "#add-cater-cart-form", function (e) {
    e.preventDefault();
    // Get the form data
    var formData = $(this).serialize();
    $.ajax({
        url: "/add-cater-cart",
        type: "post",
        data: formData,
        success: function (res) {
            // Reset the form
            $("#add-cater-cart-form")[0].reset();
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
// delete from cater cart
$(document).on("click", ".remove-cater-cart", function () {
    var id = $(this).val();
    console.log(id);
    if (confirm("Remove item from rental?")) {
        $.ajax({
            url: "/remove-cater-cart",
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
// rent cater cart
$(document).on("click", ".rent-cater-cart", function () {
    var id = $(this).val();
    $("#rent-cater-modal").modal("show");
    $("#item_id").val(id);
});
// agree term and condition
$(document).on("submit", "#agree-cater-form", function (e) {
    e.preventDefault();
    var id = $("#item_id").val();
    console.log(id);
    var formData = $(this).serialize();
    $.ajax({
        url: "/agree-term",
        data: formData,
        type: "POST",
        success: function (res) {
            // Reset the form
            $("#agree-cater-form")[0].reset();
            if (res.success) {
                $("#rent-cater-modal").modal("hide");
                window.location.href = "/rent-package/" + id;
            } else {
                // $("#error-modal").modal("show");
                // $("#error-message").html(res.error);
                $("#disagree").show();
                $("#disagree").html(res.error);
            }
            // If you want to hide a success message after 1.5 seconds, uncomment the following lines
            setTimeout(function () {
                $("#disagree").hide();
                $("#success-modal").modal("hide");
                $("#error-modal").modal("hide");
            }, 2000);
        },
    });
});

// billing
$(document).on("click", "#add-billing-btn", function () {
    $("#add-billing-modal").modal("show");
});
// submit package
$(document).on("submit", "#add-billing-form", function (e) {
    e.preventDefault();
    // Get the form data
    var formData = new FormData(this);
    $.ajax({
        url: "/add-billing",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            // Reset the form
            $("#add-billing-form")[0].reset();
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
                $("#add-billing-modal").modal("hide");
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
// billing info btn
$(document).on("click", ".billing-info-btn", function () {
    var id = $(this).data("id");
    $.ajax({
        url: "/get-image",
        data: { id: id },
        type: "get",
        success: function (res) {
            console.log(res);
            $("#billing-image").attr("src", res.image);
        },
    });
});
// submit rent order
$(document).on("submit", "#rental-order-form", function (e) {
    e.preventDefault();
    // Get the form data
    var formData = new FormData(this);
    $.ajax({
        url: "/rental-order",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            // Reset the form
            $("#rental-order-form")[0].reset();
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
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
// view down info
$(document).on("click", ".view-down-btn", function () {
    var rental_id = $(this).val();
    $("#view-down-modal").modal("show");
    $.ajax({
        url: "/get-billing-image",
        data: { rental_id: rental_id },
        type: "get",
        success: function (res) {
            $("#package-info").show();
            $("#package-price").html("Price:" + res.price);
            $("#package-downpayment").html("Downpayment:" + res.downpayment);
            $("#downpayment-image").attr("src", res.image);
        },
    });
});
// approve
$(document).on("click", ".approve-rent-btn", function () {
    var id = $(this).val();
    console.log(id);
    $.ajax({
        url: "/approve-rent/" + id,
        type: "get",
        success: function (res) {
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
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
    });
});
// decline
$(document).on("click", ".decline-rent-btn", function () {
    var id = $(this).val();
    console.log(id);
    $.ajax({
        url: "/decline-rent/" + id,
        type: "get",
        success: function (res) {
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
            } else {
                $("#error-modal").modal("show");
                $("#error-message").html(res.error);
                $("#all-data").load(window.location.href + " #all-data");
            }
            // If you want to hide a success message after 1.5 seconds, uncomment the following lines
            setTimeout(function () {
                $("#success-modal").modal("hide");
                $("#error-modal").modal("hide");
            }, 2000);
        },
    });
});

// order cake
$(document).on("click", ".order-cake", function () {
    var id = $(this).val();
    $("#order-cake-modal").modal("show");
    $("#item_id").val(id);
});
// agree term and condition
$(document).on("submit", "#agree-term-form", function (e) {
    e.preventDefault();
    var id = $("#item_id").val();
    console.log(id);
    var formData = $(this).serialize();
    $.ajax({
        url: "/agree-term",
        data: formData,
        type: "POST",
        success: function (res) {
            // Reset the form
            $("#agree-term-form")[0].reset();
            if (res.success) {
                $("#order-cake-modal").modal("hide");
                window.location.href = "/order-cake/" + id;
            } else {
                // $("#error-modal").modal("show");
                // $("#error-message").html(res.error);
                $("#disagree").show();
                $("#disagree").html(res.error);
            }
            // If you want to hide a success message after 1.5 seconds, uncomment the following lines
            setTimeout(function () {
                $("#disagree").hide();
                $("#success-modal").modal("hide");
                $("#error-modal").modal("hide");
            }, 2000);
        },
    });
});

// submit cake order
$(document).on("submit", "#avail-cake-form", function (e) {
    e.preventDefault();
    // Get the form data
    var formData = new FormData(this);
    $.ajax({
        url: "/avail-cake",
        type: "post",
        data: formData,
        contentType: false,
        processData: false,
        success: function (res) {
            // Reset the form
            $("#avail-cake-form")[0].reset();
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
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
// view down info
$(document).on("click", ".view-cake-down", function () {
    var cake_id = $(this).val();
    $("#view-down-modal").modal("show");
    $.ajax({
        url: "/get-billing-image",
        data: { cake_id: cake_id },
        type: "get",
        success: function (res) {
            $("#cake-info").show();
            $("#cake_quantity").html(res.quantity);
            $("#cake_price").html(res.price);
            $("#cake_totalPrice").html(res.totalPrice);
            $("#cake_downpayment").html(res.downpayment);
            $("#downpayment-image").attr("src", res.image);
        },
    });
});
// cake message toggle
$(document).on("click", ".cake-message-btn", function () {
    var id = $(this).val();
    console.log(id);
    $("#message-modal").modal("show");
    $.ajax({
        url: "/get-cake-message/" + id,
        type: "get",
        success: function (res) {
            console.log(res);
            $("#cake-message").html(res.message);
        },
    });
});
// approve cake order
$(document).on("click", ".approve-cake-btn", function () {
    var id = $(this).val();
    console.log(id);
    $.ajax({
        url: "/approve-cake/" + id,
        type: "get",
        success: function (res) {
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
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
    });
});
// decline cake order
$(document).on("click", ".decline-cake-btn", function () {
    var id = $(this).val();
    console.log(id);
    $.ajax({
        url: "/decline-cake/" + id,
        type: "get",
        success: function (res) {
            if (res.success) {
                $("#success-modal").modal("show");
                $("#success-message").html(res.success);
                $("#all-data").load(window.location.href + " #all-data");
            } else {
                $("#error-modal").modal("show");
                $("#error-message").html(res.error);
                $("#all-data").load(window.location.href + " #all-data");
            }
            // If you want to hide a success message after 1.5 seconds, uncomment the following lines
            setTimeout(function () {
                $("#success-modal").modal("hide");
                $("#error-modal").modal("hide");
            }, 2000);
        },
    });
});
