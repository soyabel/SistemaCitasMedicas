$(document).ready(function() {
    $("#login-form").submit(function(event) {
        event.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();

        $.ajax({
            type: "POST",
            url: "models/Usuario.php",
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                if (response === "success") {
                    window.location.href = "view/Home/";
                } else {
                    $("#error-message").text(response);
                }
            }
        });
    });
});

