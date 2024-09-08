<?php
// Menginclude file koneksi database
include 'koneksi.php';

//select data yg akan diedit
$q_select = "select * from todolist where id = '" . $_GET['id'] . "' ";
$run_q_select = mysqli_query($connection, $q_select);
$d = mysqli_fetch_object($run_q_select);

//proses edit data
if (isset($_POST['edit'])) {

    $q_update = "update todolist set label ='" . $_POST['task'] . "' where id ='" . $_GET['id'] . "' ";
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
            color: #fff;
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
                <a href="halaman.php"><i class='bx bx-chevron-left'></i></a>
                <span>Back</span>
            </div>
            <div class="description">
                <?= date("l, d M Y") ?>
            </div>
            <div class="content">
                <div class="card">
                    <form action="" method="post">
                        <input type="text" name="task" class="input-control" placeholder="Edit To Do List" value="<?= $d->label ?>">

                        <div class="text-right">
                            <button type="submit" name="edit">Edit</button>
                        </div>
                    </form>
                </div>


            </div>

        </div>

</body>

</html>
<!-- <a href="login.php">BACK</a> -->
<!-- menit tkhir 15.06 -->