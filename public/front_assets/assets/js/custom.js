jQuery("#frmRegistration").submit(function (e) {
    e.preventDefault();
    $(".loader-div").show();
    jQuery(".field_error").html("");
    jQuery.ajax({
        url: "/user/registration_process",
        data: jQuery("#frmRegistration").serialize(),
        type: "post",
        success: function (result) {
            if (result.status == "error") {
                jQuery.each(result.error, function (key, val) {
                    $(".loader-div").hide(); // hide loader
                    jQuery("#" + key + "_error").html(val[0]);
                });
            }

            if (result.status == "success") {
                $(".loader-div").hide(); // hide loader
                jQuery("#frmRegistration")[0].reset();
                jQuery("#thank_you_msg").html(result.msg);
            }
        },
    });
});

jQuery("#frmLogin").submit(function (e) {
    jQuery("#login_msg").html("");
    e.preventDefault();
    jQuery.ajax({
        url: "/user/login_process",
        data: jQuery("#frmLogin").serialize(),
        type: "post",
        success: function (result) {
            if (result.status == "error") {
                jQuery("#login_msg").html(result.msg);
            }

            if (result.status == "success") {
                window.location.href = window.location.href;
                //alert('success');
                //jQuery('#frmLogin')[0].reset();
                //jQuery('#thank_you_msg').html(result.msg);
            }
        },
    });
});

jQuery("#frmLogin1").submit(function (e) {
    $(".loader-div").show();
    jQuery("#login_msg").html("");
    e.preventDefault();
    jQuery.ajax({
        url: "/user/login_process",
        data: jQuery("#frmLogin1").serialize(),
        type: "post",
        success: function (result) {
            if (result.status == "error") {
                $(".loader-div").hide(); // hide loader
                jQuery("#login_msg").html(result.msg);
            }

            if (result.status == "success") {
                // window.location.href = window.location.href;
                window.location.href = "/user/dashboard";
                //alert('success');
                //jQuery('#frmLogin')[0].reset();
                //jQuery('#thank_you_msg').html(result.msg);
            }
        },
    });
});

function forgot_password() {
    jQuery("#popup_forgot").show();
    jQuery("#popup_login").hide();
}

function show_login_popup() {
    jQuery("#popup_forgot").hide();
    jQuery("#popup_login").show();
}

jQuery("#frmForgot").submit(function (e) {
    //jQuery("#forgot_msg").html("Please wait...");
    $(".loader-div").show();
    e.preventDefault();
    jQuery.ajax({
        url: "/user/forgot_password",
        data: jQuery("#frmForgot").serialize(),
        type: "post",
        success: function (result) {
            console.log(result);
            $(".loader-div").hide(); // hide loader
            jQuery("#forgot_msg").html(result.msg);
        },
    });
});

jQuery("#frmUpdatePassword").submit(function (e) {
    //jQuery("#thank_you_msg").html("Please wait...");
    $(".loader-div").show();
    jQuery("#thank_you_msg").html("");
    e.preventDefault();
    jQuery.ajax({
        url: "/user/forgot_password_change_process",
        data: jQuery("#frmUpdatePassword").serialize(),
        type: "post",
        success: function (result) {
            console.log(result);
            jQuery("#frmUpdatePassword")[0].reset();
            $(".loader-div").hide(); // hide loader
            jQuery("#thank_you_msg").html(result.msg);
        },
    });
});
