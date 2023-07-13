
$(document).ready(function () {
  // Menampilkan daftar saat halaman dimuat
  showUserList();
  showVehicleList();
  showParkIn();
  showParkOut();
  userCard();
  vehicleCard();
  parkFilledCard();
  parkAvailableCard();
  showReport();

  // >>>>>>>>>>>>>>>>> SECTION PENGGUNA <<<<<<<<<<<<<<<<<

  // Menambah pengguna baru
  $("#btn-user-add").click(function () {
    $("#btn-add-user").removeAttr("hidden");
    $("#btn-add-user").removeClass("btn-secondary");
    $("#btn-add-user").addClass("btn-primary");
    
    $("#btn-edit-user").attr("hidden", true);
  });
  $("#btn-add-user").click(function () {
    var nama = $("#namaUser").val();
    var username = $("#usernameUser").val();
    var password = $("#passwordUser").val();

    $.ajax({
      url: "config/addUser.php",
      type: "POST",
      data: {
        _nama: nama,
        _username: username,
        _password: password
      },
      success: function (response) {
        // Menampilkan pesan sukses
        $("#result").html(response);

        // Mengosongkan input
        $("#namaUser").val("");
        $("#usernameUser").val("");
        $("#passwordUser").val("");

        // Menampilkan daftar pengguna terbaru
        showUserList()
      },
      error: function () {
        alert ("ada error saat post")
      }
    });
  });

  // Mengedit pengguna
  $(document).on("click", ".icon-edit-user", function () {
    var userId = $(this).data("id");
    var name = $(this).data("name");
    var userName = $(this).data("username");
    var password = $(this).data("password");
    
    // Input value sesuai id
    $("#namaUser").val(name);
    $("#usernameUser").val(userName);
    $("#passwordUser").val(password);

    // tambah, hapus attr dan class saat btn-user-add ("Tambah User") di klik
    $("#btn-user-add").click();

    $("#btn-add-user").attr("hidden", true);

    $("#btn-edit-user").removeAttr("hidden");
    $("#btn-edit-user").removeClass("btn-secondary");
    $("#btn-edit-user").addClass("btn-primary");
      
      // Post data via AJAX
    $("#btn-edit-user").click(function () {
      $.ajax({
        url: "config/updateUser.php",
        type: "POST",
        data: {
          _id: userId,
          _name: $("#namaUser").val(),
          _username: $("#usernameUser").val(),
          _password: $("#passwordUser").val()
        },
        success: function (response) {
          // Menampilkan pesan sukses
          $("#result").html(response);

          // Menampilkan daftar pengguna terbaru
          showUserList();
        },
      });
    });
  });

  // Menghapus pengguna
  $(document).on("click", ".icon-delete-user", function () {
    if (confirm("Yakin ingin dihapus? ")) {
      var userId = $(this).data("id");
      $.ajax({
        url: "config/deleteUser.php",
        type: "POST",
        data: { _id: userId },
        success: function (response) {
          // Menampilkan pesan sukses
          $("#result").html(response);

          // Menampilkan daftar pengguna terbaru
          showUserList();
        },
      });
    }
  });

  // >>>>>>>>>>>>>>>>> SECTION KENDARAAN <<<<<<<<<<<<<<<<<

  // Menambah kendaraan baru
  $("#btn-add-kendaraan").click(function () {
    var jenis = $("#jenisKendaraan").val();
    var tarif = $("#tarif").val();

    $.ajax({
      url: "config/addKendaraan.php",
      type: "POST",
      data: {
        _jenisKendaraan: jenis,
        _tarif: tarif
      },
      success: function (response) {
        // Menampilkan pesan sukses
        $("#result").html(response);

        // Mengosongkan input
        $("#jenisKendaraan").val("");
        $("#tarif").val("");

        // Menampilkan daftar kendaraan terbaru
        showVehicleList()
      },
      error: function () {
        alert ("ada error saat post")
      }
    });
  });

  // Update kendaraan
  $(document).on("click", ".icon-edit-vehicle", function () {
    var userId = $(this).data("id");
    var jenis = $(this).data("jenis");
    var tarif = $(this).data("tarif");
    
    // Input value sesuai id
    $("#jenisKendaraan").val(jenis);
    $("#tarif").val(tarif);

    // tambah, hapus attr dan class saat btn-user-add ("Tambah User") di klik
    $("#btn-kendaraan-add").click();

    $("#btn-add-kendaraan").attr("hidden", true);

    $("#btn-edit-kendaraan").removeAttr("hidden");
    $("#btn-edit-kendaraan").removeClass("btn-secondary");
    $("#btn-edit-kendaraan").addClass("btn-primary");
      
      // Post data via AJAX
    $("#btn-edit-kendaraan").click(function () {
      $.ajax({
        url: "config/updateKendaraan.php",
        type: "POST",
        data: {
          _id: userId,
          _jenis: $("#jenisKendaraan").val(),
          _tarif: $("#tarif").val()
        },
        success: function (response) {
          // Menampilkan pesan sukses
          $("#result").html(response);

          // Menampilkan daftar kendaraan terbaru
          showVehicleList();
        },
      });
    });
  });

  // Menghapus kendaraan
  $(document).on("click", ".icon-delete-vehicle", function () {
    if (confirm("Yakin ingin dihapus? ")) {
      var userId = $(this).data("id");
      $.ajax({
        url: "config/deleteKendaraan.php",
        type: "POST",
        data: { _id: userId },
        success: function (response) {
          // Menampilkan pesan sukses
          $("#result").html(response);

          // Menampilkan daftar kendaraan terbaru
          showVehicleList();
        },
      });
    } else {
    }
  });

  // >>>>>>>>>>>>>>>>> SECTION PARKIR <<<<<<<<<<<<<<<<<

  // Menambah parkir masuk
  $("#btn-add-parkIn").click(function () {
    var plat = $("#nomorPlat").val();
    var jenis = $("#jenisKendaraan option:selected").text();
  
    $.ajax({
      url: "config/addParkIn.php",
      type: "POST",
      data: {
        _plat: plat,
        _jenisKendaraan: jenis
      },
      success: function (response) {
        // Menampilkan pesan sukses
        $("#result").html(response);

        // Mengosongkan input
        $("#nomorPlat").val("");
        $("#jenisKendaraan").val("");

        // Menampilkan daftar parkir masuk
          showParkIn();
      },
      error: function () {
        alert ("ada error saat post")
      }
    });
  });

  // Menambah parkir keluar
  $("#btn-add-parkOut").click(function () {
    var kode = $("#kodeParkir").val();
    // Insert parkir keluar
    $.ajax({
      url: "config/addParkOut.php",
      type: "POST",
      data: {
        _kode: kode
      },
      success: function (response) {
        
        // Menampilkan pesan sukses
        $("#result").html(response);

        // Mengosongkan input
        $("#kodeParkir").val("");

        // Menampilkan daftar parkir keluar
          showParkOut();
      },
      error: function () {
        alert ("ada error saat post")
      }
    });

    // Update status di parkir masuk
    $.ajax({
      url: "config/updateParkIn.php",
      type: "POST",
      data: {
        _kode: kode
      },
      success: function (response) {
        // Menampilkan pesan sukses
        $("#result").html(response);
        $("#status-parkir").removeClass("bg-success");
        $("#status-parkir").addClass("bg-danger");

        // Mengosongkan input
        $("#kodeParkir").val("");

        // Menampilkan daftar parkir keluar
          showParkOut();
      },
      error: function () {
        alert ("ada error saat post")
      }
    });
  });
  
    // Menghapus parkir masuk
    $(document).on("click", ".icon-delete-parkIn", function () {
      if (confirm("Yakin ingin dihapus? ")) {
        var userId = $(this).data("id");
        $.ajax({
          url: "config/deleteParkIn.php",
          type: "POST",
          data: { _id: userId },
          success: function (response) {
            // Menampilkan pesan sukses
            $("#result").html(response);
  
            // Menampilkan daftar parkir masuk
            showParkIn();
          },
        });
      }
    });
});


// >>>>>>>>>>>>>>>>> SECTION FUNCTION <<<<<<<<<<<<<<<<<

// Fungsi untuk menampilkan daftar pengguna
function showUserList() {
  $.ajax({
    url: "config/getUser.php",
    type: "GET",
    success: function (response) {
      // Menampilkan daftar pengguna dalam tabel
      $("#userTable").html(response);
    },
    error: function (e) {
      alert(e);
    },
  });
};

// Fungsi untuk menampilkan data kendaraan
function showVehicleList() {
  $.ajax({
    url: "config/getKendaraan.php",
    type: "GET",
    success: function (response) {
      // Menampilkan daftar kendaraan dalam tabel
      $("#vehicleTable").html(response);
    },
    error: function (e) {
      alert(e);
    },
  });
};

// Fungsi untuk menampilkan data parkir masuk
function showParkIn() {
  $.ajax({
    url: "config/getParkIn.php",
    type: "GET",
    success: function (response) {
      // Menampilkan daftar parkir masuk dalam tabel
      $("#parkirMasukTable").html(response);
    },
    error: function () {
      alert("Ada error saat GET");
    },
  });
};

// Fungsi untuk menampilkan data parkir keluar
function showParkOut() {
  $.ajax({
    url: "config/getParkOut.php",
    type: "GET",
    success: function (response) {
      // Menampilkan daftar parkir keluar dalam tabel
      $("#parkirKeluarTable").html(response);
    },
    error: function () {
      alert("Ada error saat GET");
    },
  });
};

// Fungsi untuk update card user
function userCard() {
  $.ajax({
    url: "config/userCard.php",
    type: "GET",
    success: function (response) {
      // Menampilkan daftar parkir keluar dalam tabel
      $("#jumlah-user").html(response);
    },
    error: function () {
      alert("Ada error saat GET");
    },
  });
};

// Fungsi untuk update card kendaraan
function vehicleCard() {
  $.ajax({
    url: "config/vehicleCard.php",
    type: "GET",
    success: function (response) {
      // Menampilkan daftar parkir keluar dalam tabel
      $("#jenis-kendaraan").html(response);
    },
    error: function () {
      alert("Ada error saat GET");
    },
  });
};

// Fungsi untuk update card parkir terisi
function parkFilledCard() {
  $.ajax({
    url: "config/parkFilledCard.php",
    type: "GET",
    success: function (response) {
      // Menampilkan daftar parkir keluar dalam tabel
      $("#parkir-terisi").html(response);
    },
    error: function () {
      alert("Ada error saat GET");
    },
  });
};

// Fungsi untuk update card parkir terisi
function parkAvailableCard() {
  $.ajax({
    url: "config/parkAvailableCard.php",
    type: "GET",
    success: function (response) {
      // Menampilkan daftar parkir keluar dalam tabel
      if (response == "FULL") {
        alert("Parkir Penuh!");
        $("#btn-add-parkIn").attr("disabled", true);
      } else {
        $("#parkir-kosong").html(response);
        $("#btn-add-parkIn").removeAttr("disabled");
      }
      
    },
    error: function () {
      alert("Ada error saat GET");
    },
  });
};

// >>>>>>>>>>>>>>>>> SECTION REPORT <<<<<<<<<<<<<<<<<

function showReport() {
  $.ajax({
    url: "config/report.php",
    type: "GET",
    success: function (response) {
      // Menampilkan daftar kendaraan dalam tabel
      $("#tableLaporan").html(response);
    },
    error: function (e) {
      alert(e);
    },
  });
};