// JavaScript Document
$('#login').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: 'cek/login',
        data: $(this).serialize(),
        beforeSend: function() {
            document.querySelector('#tblmasuk').innerHTML = '<i class="ph-spinner spinner"></i> Loading...';
        },
        success: function(data) {
            if (data === 'gagal') {
                $("#pesan_gagal").fadeIn();
                $("#pesan_gagal").html('Username atau Password Anda Salah!');
                setTimeout(function() {
                    $("#pesan_gagal").fadeOut();
                }, 2000); //will call the function after 2 secs.
            } else {
                $("#pesan_gagal").fadeOut();
                $("#pesan_sukses").fadeIn();
                $("#pesan_sukses").html('Login Berhasil..');
                setTimeout(function() {
                    document.cookie = 'token' + "=" + data + "secure";
                    window.location = data;
                }, 1000); //will call the function after 2 secs. 
            }
        },
        complete: function(data) {
            document.querySelector('#tblmasuk').innerHTML = 'Sign In';
        }
    });
});