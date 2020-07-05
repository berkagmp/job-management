jQuery(document).ready(function () {
    const validate_rule = {
        uid: {
            required: true,
            maxlength: 255,
            remote: '/api/idcheck'
        },
        firstname: {
            required: true,
            maxlength: 50
        },
        lastname: {
            maxlength: 50,
            required: true
        },
        name: {
            maxlength: 100,
            required: true
        },
        username: {
            maxlength: 100,
            required: true
        },
        email: {
            maxlength: 255,
            email: true,
            required: true
        },
        phone: {
            required: true,
            number: true,
            maxlength: 20
        },
        password: {
            maxlength: 200,
            required: true
        },
        password_confirmation: {
            equalTo: "#validateAddForm #password"
        }
    };

    $("#validateAddForm").validate({
        rules: validate_rule,
        messages: {
            uid: "The user id has been occupied."
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    $("#loginForm").validate({
        rules: {
            uid : "required",
            password: "required"
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    $(document).on("click", "#btn_register", function(event) {
        event.preventDefault();
        $("#addModal").modal("show");
    });

});
