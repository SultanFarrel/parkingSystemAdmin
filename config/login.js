  // LoginForm
  $("#loginForm").submit(function(e) {
    e.preventDefault();

    var username = $("#username").val();
    var password = $("#password").val();

    // Verifikasi Login
    $.ajax({
        url: "config/checkLogin.php",
        type: "POST",
        data: {
          _username: username,
          _password: password
        },
        
        success: function (response) {
            if (response == "Login Berhasil") {
                alert("Login Berhasil");
                window.location.href = "home.html";
            } else {
                alert("Username atau Password Salah");
                $("#username").val('');
                $("#password").val('');
            }

        },
        error: function () {
          alert ("ada error saat post")
        }
      });
  });

  $("#loginTab").click(function(e) {
    e.preventDefault();
    $("#registerTab").removeClass("active");
    $("#loginTab").addClass("active");
    $("#registerForm").removeClass("active");
    $("#loginForm").addClass("active");
  });

  $("#registerTab").click(function(e) {
    e.preventDefault();
    $("#loginTab").removeClass("active");
    $("#registerTab").addClass("active");
    $("#loginForm").removeClass("active");
    $("#registerForm").addClass("active");
  });