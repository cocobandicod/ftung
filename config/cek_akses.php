<?php

function cek_url($url, $proses, $act, $tabel, $where)
{
    if ($act == 'edit') {
        $cek = $proses->cek_fetch($tabel, $where);
        if (empty($cek)) {
            header('Location: ' . $url . '404');
            exit();
        }
    }
}

function cek_akses($url, $proses, $token)
{
    if (isset($token)) {
        $row = $proses->tampil_data_saja('token,nama', 'pengguna', 'token = "' . $token . '"');
        if (isset($row['token'])) {
        } else {
            echo "<script>
            alert('Maaf URL Salah anda tidak bisa mengakses halaman ini..'); 
            window.opener = self;
            window.close();
            </script>";
            exit;
            exit;
        }
    } else {
        echo "<script>alert('Maaf URL Salah anda tidak bisa mengakses halaman ini..'); 
      document.location='" . $url . "'</script>";
        exit;
        exit;
    }
}

function cek_nama($con, $token)
{
    if (isset($token)) {
        $result = mysqli_query($con, "SELECT token,nama FROM pengguna WHERE token = '$token'");
        $row = mysqli_fetch_array($result);
        if (isset($row['token'])) {
            $nama_pemilik = $row['nama'];
        }
        return $nama_pemilik;
    }
}

function cek_login_akses($proses, $url, $kode_user, $token)
{
    if (isset($kode_user)) {
        $result = $proses->cek_pengguna('token', 'operator', 'id_operator=' . "'$kode_user'");
        if ($result) {
            $token_user = $result['token'];
            if ($token != $token_user) {
                session_destroy();
                session_unset();
                echo "<script>alert('Maaf anda harus login...'); 
             document.location='" . $url . "admbkp'</script>";
                exit;
                exit;
            }
        }
    } else {
        echo "<script>alert('Maaf anda harus login...');
       document.location='" . $url . "'</script>";
        exit;
        exit;
    }
}

function cek_hak_akses($url, $kode_user, $level, $akses)
{
    if (isset($kode_user)) {
        $akses_user = explode(',', @$akses);
        if (in_array($level, $akses_user)) {
        } else {
            echo "<script>
             alert('Maaf anda tidak bisa mengakses halaman ini..'); 
             window.history.back();
             </script>";
            exit;
            exit;
        }
    } else {
        echo "<script>alert('Maaf anda harus login...'); 
       document.location='" . $url . "'</script>";
        exit;
        exit;
    }
}

function cek_akses_pengguna($proses, $url, $kode_user, $token)
{
    if (isset($kode_user)) {
        $result = $proses->cek_pengguna('token', 'pengguna', 'id_pengguna=' . "'$kode_user'");
        if ($result) {
            $token_user = $result['token'];
            if ($token != $token_user) {
                echo "<script>alert('Maaf anda harus login pengguna...'); 
             document.location='" . $url . "'</script>";
                exit;
                exit;
            }
        }
    } else {
        echo "<script>alert('Maaf anda harus login pengguna...');
       document.location='" . $url . "'</script>";
        exit;
        exit;
    }
}
