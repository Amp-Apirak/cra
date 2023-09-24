<!DOCTYPE html>
<html lang="en">
<?php $menu = "user"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRA | Open User</title>


    <!----------------------------- start header ------------------------------->
    <?php include("../its/templated/head.php"); ?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include("../its/templated/menu.php"); ?>
    <!----------------------------- end menu --------------------------------->
    <!----------------------------- start Time ------------------------------->
    <?php
    date_default_timezone_set('asia/bangkok');
    $date = date('d/m/Y');
    $time = date("H:i:s", "1359780799");
    ?>
    <!----------------------------- start Time ------------------------------->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Open User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Open User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- เพิ่มข้อมูล -->
                        <?php

                        if (isset($_POST['submit'])) { /* ถ้า POST มีการกด Submit ให้ทำส่วนล่าง */

                            $user_name  = $_POST['user_name']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
                            $user_position = $_POST['user_position'];
                            $user_number = $_POST['user_number'];
                            $user_ip = $_POST['user_ip'];
                            $user_status = $_POST['user_status'];
                            $user_department = $_POST['user_department'];
                            $user_details = $_POST['user_details'];
                            $user_email = $_POST['user_email'];
                            $user_date = $_POST['user_date'];



                            // print_r($_POST);

                            $sql =  "INSERT INTO `tb_user` (`user_id`, `user_name`,`user_position`, `user_number`, `user_ip`, `user_status`, `user_department`, `user_details`, `user_email`, `user_date`) 
                            VALUES (NULL, '$user_name', '$user_position', '$user_number', '$user_ip', '$user_status', '$user_department', '$user_details', '$user_email', '$user_date')";
                            $result = $conn->query($sql);

                            // print_r($_POST);

                            if ($result) {
                                // <!-- sweetalert -->
                                echo '<script>
                                        setTimeout(function(){
                                            swal({
                                                title: "Save Successfully!",
                                                text: "Thank You . ",
                                                type:"success"
                                            }, function(){
                                                window.location = "user.php";
                                            })
                                        },1000);
                                    </script>';
                                // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
                            } else {
                                // <!-- sweetalert -->
                                echo '<script>
                                        setTimeout(function(){
                                            swal({
                                                title: "Can Not Save Successfully!",
                                                text: "Checking Your Data",
                                                type:"warning"
                                            }, function(){
                                                window.location = "user_is.php";
                                            })
                                        },1000);
                                    </script>';
                                // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
                            }
                        }
                        // echo '<pre>';
                        // print_r($_POST);
                        // print_r($_FILES);
                        // echo '</pre>';
                        ?>
                        <!-- เพิ่มข้อมูล -->

                        <div class="row">
                            <!-- /.col (left) -->
                            <div class="col-md-12 mx-auto">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Report descriptions</h3>
                                    </div>

                                    <form action="#" method="POST" enctype="multipart/form-data">

                                        <div class="card-body">

                                            <!-- Date and time -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date :</label>
                                                        <div class="input-group date">
                                                            <input type="text" value="<?php echo $date; ?>"
                                                                name="user_date"
                                                                class="form-control datetimepicker-input"
                                                                data-target="#reservationdatetime" />
                                                            <div class="input-group-append"
                                                                data-target="#reservationdatetime"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i
                                                                        class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Date and time -->

                                                <div class="col-md-2 ml-auto">
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control select2" name="status_ac"
                                                            style="width: 100%;" required>
                                                            <option selected="selected"></option>
                                                            <option>พนังานโรงพยาบาล</option>
                                                            <option>Outsource</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">First - Lastname</label>
                                                        <input type="int" name="user_name" class="form-control"
                                                            id="exampleInputEmail1" placeholder="ชื่อ-สกุล (ภาษาไทย)"
                                                            required>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Positions</label>
                                                        <input type="int" name="lastname" class="form-control"
                                                            id="exampleInputEmail1" placeholder="ตำแหน่ง....." required>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->

                                            </div>
                                            <!-- /.form-group -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Department</label>
                                                        <input type="int" name="user_department" class="form-control"
                                                            id="exampleInputEmail1" placeholder="แผนก/ชั้น/ฝ่าย......"
                                                            required>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->

                                                <div class="col-md-6">
                                                    <label>IP Remote:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-laptop"></i></span>
                                                        </div>
                                                        <input type="text" name="user_ip" class="form-control"
                                                            data-inputmask="'alias': 'ip'" data-mask>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email :</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-envelope"></i></span>
                                                        </div>
                                                        <input type="email" class="form-control" name="user_email"
                                                            placeholder="Email" required>

                                                    </div>
                                                </div>
                                                <!-- /.form-group -->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Phone Number</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-phone"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control" name="user_number"
                                                                data-inputmask='"mask": "(999) 999-9999"' data-mask
                                                                required>
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.form-group -->


                                            <p>
                                            <div class="form-group">
                                            <label>Details :</label>
                                                <textarea class="form-control" name="km_re" id="user_details" rows="10" placeholder="ระบุรายละเอีดยเพิ่มเติม........"></textarea required>
                                            </div>
                                            <!-- /.form-group -->



                                            <!-- Date range -->
                                            <div class="form-group mt-5">
                                                <button type="submit" name="submit" value="submit"
                                                    class="btn btn-success">Save</button>
                                            </div>
                                            <!-- /.form group -->
                                    </form>
                                </div>
                                <div class="card-footer">
                                    Visit <a href="https://getdatepicker.com/5-4/">tempusdominus </a> for more examples
                                    and information about
                                    the plugin.
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            <!-- /.card -->
                        </div>
                        <!-- /.col (right) -->
                    </div>
                    <!-- /.col (right) -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->



    </div>
    <!-- /.content-wrapper -->


    <!----------------------------- start menu ------------------------------->
    <?php include("../its/templated/footer.php"); ?>
    <!----------------------------- end menu --------------------------------->

    <!-- highlight -->
    <script src="code/dist/js/highlight.js"></script>

    <script>
    $("#myTable tr").highlight();
    </script>
    <!-- highlight -->