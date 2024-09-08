<?php
// Menginclude file koneksi database
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $label = mysqli_real_escape_string($connection, $_POST['task']);
    $status = 'open';

    $q_insert = "INSERT INTO todolist (label, status) VALUES ('$label', '$status')";

    $run_q_insert = mysqli_query($connection, $q_insert);

    if ($run_q_insert) {
        // Redirect menggunakan header dan exit untuk menghentikan eksekusi lebih lanjut
        header('Location: halaman.php');
        exit();
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
//proses show data
$q_select = "select * from todolist order by id desc";
$run_q_select = mysqli_query($connection, $q_select);

//proses delete data
if (isset($_GET['delete'])) {
    $q_delete = "delete from todolist where id = '" . $_GET['delete'] . "' ";
    $run_q_delete = mysqli_query($connection, $q_delete);

    header('Location: halaman.php');
}
//proses up data (close or open)
if (isset($_GET['done'])) {
    $status = 'close';
    if ($_GET['status'] == 'open') {
        $status = 'close';
    } else {
        $status = 'open';
    }
    $q_update = "update todolist set status = '" . $status . "' where id = '" . $_GET['done'] . "' ";
    $run_q_update = mysqli_query($connection, $q_update);

    header('Location: halaman.php');
}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500;700&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Roboto", sans-serif;
            background: #654ea3;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #eaafc8, #654ea3);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #eaafc8, #654ea3);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }

        .container {
            /* border: 1px solid; */
            width: 590px;
            height: 100vh;
            margin: 0 auto;
        }

        .header {
            /* border: 1px solid; */
            padding: 15px;
            color: #fff;
        }

        .header .title {
            /* border: 1px solid; */
            display: flex;
            align-items: center;
            margin-bottom: 7px;
        }

        .header .title i {
            font-size: 24px;
            margin-right: 10px;
        }

        .header .title span {
            font-size: 18px;
        }

        .header .description {
            font-size: 14px;

        }

        .content {
            /* border: 1px solid; */
            padding: 15px;
        }

        .card {
            border: 1px solid;
            background-color: #fff;
            color: #000;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .input-control {
            width: 100%;
            display: block;
            padding: 0.5rem;
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .text-right {
            text-align: right;
        }

        button {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            cursor: pointer;
            background: #654ea3;
            color: #fff;
            border: 1px solid;
            border-radius: 5px;
        }

        .task-item {
            /* border: 1px solid; */
            display: flex;
            justify-content: space-between;
        }

        .text-purple {
            color: purple;
        }

        .task-item.done span {
            text-decoration: line-through;
            color: grey;

        }

        @media (max-width: 768px) {
            .container {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="title">
                <i class='bx bx-list-check'></i>
                <span>To Do List</span>
            </div>
            <div class="description">
                <?= date("l, d M Y") ?>
            </div>
            <div class="content">
                <div class="card">
                    <form action="" method="post">
                        <input type="text" name="task" class="input-control" placeholder="Text To Do">

                        <div class="text-right">
                            <button type="submit" name="tambah">Tambah</button>
                        </div>
                    </form>
                </div>

                <?php
                if (mysqli_num_rows($run_q_select) > 0) {
                    while ($r = mysqli_fetch_array($run_q_select)) {
                ?>
                        <div class="card">
                            <div class="task-item <?= $r['status'] == 'close' ? 'done' : '' ?>">
                                <div>
                                    <input type="checkbox" onclick="window.location.href ='?done=<?= $r['id'] ?>&status=<?= $r['status'] ?>'" <?= $r['status'] == 'close' ? 'checked' : '' ?>>
                                    <span><?= $r['label'] ?></span>
                                </div>
                                <div>
                                    <a href="edit.php?id=<?= $r['id'] ?>" class="text-purple" title="Edit"><i class="bx bx-edit"></i></a>
                                    <a href="?delete=<?= $r['id'] ?>" class="text-purple" title="Hapus" onclick="return confirm ('Apakah Anda Yakin?')"><i class="bx bx-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <div>Belum ada to do list</div>
                <?php } ?>
            </div>

        </div>

</body>

</html>
<!-- <a href="login.php">BACK</a> -->
<!-- menit tkhir 15.06 -->