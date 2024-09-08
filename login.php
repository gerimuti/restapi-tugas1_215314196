<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .header {
            border: 1px solid #ccc;
            background-color: #cca2ea;
            color: #000;
            padding: 20px;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 600px;
            display: flex;
            align-items: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header img {
            width: 80px;
            /* ukuran foto */
            height: 100px;
            /* ukuran foto */
            border-radius: 5px;
            margin-right: 20px;
        }

        .header .info {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
            line-height: 1.2;
            /* Mengatur jarak antara baris */
        }

        .header h2 {
            margin: 50px 0 0;
            /* Jarak atas 5px, margin bawah 0 */
            font-size: 16px;
            line-height: 1.2;
            /* Mengatur jarak antara baris */
        }
    </style>

<body>
    <!-- Header -->
    <div class="header">
        <img src="key.jpg" alt="Foto">
        <h1>Kezia Megumi Manabung </h1>
        <h2>NIM: 215314196</h2>
    </div>

    <div class="kotak_login">
        <p class="tulisan_login"> Silahkan login</p>
        <form action="ceklogin.php" method="post" role="from">
            <label for="username">Username</label>
            <input type="text" name="username" class="form_login" placeholder="Masukkan Username">
            <label for="password">Password</label>
            <input type="password" name="password" class="form_login" placeholder="Masukkan Password">

            <input type="submit" class="tombol_login" value="Login">
        </form>
    </div>
</body>

</html>
<!-- <div class="kotak_login">
        <form action="proses_login.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" class="form_login" placeholder="Masukkan Username">

            <label for="password">Password</label>
            <input type="password" name="password" class="form_login" placeholder="Masukkan Password">

            <input type="submit" class="tombol_login" value="Login">
        </form>
    </div> -->