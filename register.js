$(document).ready(function () {
  $("#submit").click(function () {
    let name = $("#name").val();
    let email = $("#email").val();
    let password = $("#password").val();
    let cpassword = $("#cpassword").val();
    let mobile = $("#mobile").val();
    let city = $("#city option:selected").val();
    let gender = $("input[name='gender']:checked").val();
    var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

    // console.log(name, email, password, cpassword, mobile, city, gender);

    var error_name = false;
    var error_email = false;
    var error_password = false;
    var error_cpassword = false;
    var error_mobile = false;
    var error_city = false;

    // name
    function check_name() {
      if (name == "") {
        $("#checkname").removeClass("hide");
        $("#name").css("border", "1px solid red");
        error_name = true;
      } else {
        $("#checkname").addClass("hide");
        $("#name").css("border", "1px solid green");
      }
    }

    // email
    function check_email() {
      if (email == "") {
        $("#checkemail").removeClass("hide");
        $("#email").css("border", "1px solid red");
        error_email = true;
      } else if (!pattern.test(email)) {
        $("#checkemail").removeClass("hide");
        $("#checkemail").text("Enter valid Email");
        $("#email").css("border", "1px solid red");
        error_email = true;
      } else {
        $("#checkemail").addClass("hide");
        $("#email").css("border", "1px solid green");
      }
    }
    // password
    function check_password() {
      if (password == "") {
        $("#checkpassword").removeClass("hide");
        $("#password").css("border", "1px solid red");
        error_password = true;
      } else if (password.length < 8) {
        $("#checkpassword").removeClass("hide");
        $("#checkpassword").text("Atleast 8 characters required");
        $("#password").css("border", "1px solid red");
        error_password = true;
      } else {
        $("#checkpassword").addClass("hide");
        $("#password").css("border", "1px solid green");
      }
    }
    // Conform password
    function check_cpassword() {
      if (cpassword == "") {
        $("#checkcpassword").removeClass("hide");
        $("#cpassword").css("border", "1px solid red");
        error_cpassword = true;
      } else if (cpassword !== password) {
        $("#checkcpassword").removeClass("hide");
        $("#checkcpassword").text("Password does not match");
        $("#cpassword").css("border", "1px solid red");
        error_cpassword = true;
      } else {
        $("#checkcpassword").addClass("hide");
        $("#cpassword").css("border", "1px solid green");
      }
    }
    // Mobile Number
    function check_mobile() {
      if (mobile == "") {
        $("#checkmobile").removeClass("hide");
        $("#mobile").css("border", "1px solid red");
        error_mobile = true;
      } else if (mobile.length !== 10) {
        $("#checkmobile").removeClass("hide");
        $("#checkmobile").text("Enter valid mobile number");
        $("#mobile").css("border", "1px solid red");
        error_mobile = true;
      } else {
        $("#checkmobile").addClass("hide");
        $("#mobile").css("border", "1px solid green");
      }
    }
    // city
    function check_city() {
      if (city == "") {
        $("#checkcity").removeClass("hide");
        $("#city").css("border", "1px solid red");
        error_city = true;
      } else {
        $("#checkcity").addClass("hide");
        $("#city").css("border", "1px solid green");
      }
    }

    $("#name,#email,#password,#cpassword,#mobile,#city").focus(function () {
      $(this).next().addClass("hide");
    });
    $("#name,#email,#password,#cpassword,#mobile,#city").blur(function () {
      let value = $(this).val();
      if (value == "") {
        $(this).next().removeClass("hide");
        $(this).css("border", "1px solid red");
      } else {
        $(this).next().addClass("hide");
        $(this).css("border", "1px solid black");
      }
    });

    check_name();
    check_email();
    check_password();
    check_cpassword();
    check_mobile();
    check_city();

    if (
      error_name == false &&
      error_email == false &&
      error_password == false &&
      error_cpassword == false &&
      error_mobile == false &&
      error_city == false
    ) {
      console.log("success");
    } else {
      console.log("error");
      return false;
    }
  });
});
