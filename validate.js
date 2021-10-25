$(document).ready(function () {
  $("#register-form").validate({
    rules: {
      name: { required: true },
    },
    messages: {
      name: { required: "Enter Name" },
    },
  });
});
