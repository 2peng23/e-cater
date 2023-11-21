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
                $("#cake-category").load(
                    window.location.href + " #cake-category"
                );
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
                $("#cake-list").load(window.location.href + " #cake-list");
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
