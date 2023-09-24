<!DOCTYPE html>
<html lang="en">
<?php $menu = "report"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRA | Open Report</title>


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
                        <h1>Open Report</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Open Report</li>
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

                            $report_type  = $_POST['report_type']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
                            $report_name = $_POST['report_name'];
                            $report_link = $_POST['report_link'];
                            $report_staff = $_POST['report_staff'];
                            $report_date = $_POST['report_date'];

                            $upfile_one = $_POST['upfile_one'];
                            $upfile = $_POST['upfile'];

                            

                            $upfile_one = $_FILES['upfile_one']['name'];
                            $file_tmp1 = $_FILES['upfile_one']['tmp_name'];
                            move_uploaded_file($file_tmp1, "../its/Report/$upfile_one");
                            
                            $upfile = $_FILES['upfile']['name'];
                            $file_tmp = $_FILES['upfile']['tmp_name'];
                            move_uploaded_file($file_tmp, "../its/Report/$upfile");


                            print_r($_POST);

                            $sql =  "INSERT INTO `tb_report` (`id_report`, `report_type`,`report_name`, `report_staff`, `report_date`, `report_link`, `upfile`, `upfile_one`) 
                            VALUES (NULL, '$report_type', '$report_name', '$report_staff', '$report_date', '$report_link', '$upfile', '$upfile_one')";
                            $result = $conn->query($sql);

                            print_r($_POST);

                            if ($result) {
                                // <!-- sweetalert -->
                                echo '<script>
                                        setTimeout(function(){
                                            swal({
                                                title: "Save Successfully!",
                                                text: "Thank You . ",
                                                type:"success"
                                            }, function(){
                                                window.location = "report.php";
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
                                                window.location = "report_is.php";
                                            })
                                        },1000);
                                    </script>';
                                echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
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
                                            <div class="form-group">
                                                <label>Date and time:</label>
                                                <div class="input-group date">
                                                    <input type="text" value="<?php echo $date; ?>" name="report_date" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Date and time -->

                                            <div class="form-group" required>
                                                <label>Report Type</label>
                                                <select class="form-control select2" name="report_type" style="width: 100%;" required >
                                                    <option selected="selected"></option>
                                                    <option>Daily Report</option>
                                                    <option>Weekly report</option>
                                                    <option>Monthly report</option>
                                                    <option>Other report</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Report Name</label>
                                                <input type="int" name="report_name" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Link Form Drive</label>
                                                <input type="int" name="report_link" class="form-control" id="exampleInputEmail1" placeholder="">
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Persetation Report</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="upfile_one" name="upfile_one" required>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Data Report</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="upfile" name="upfile" required>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ผู้บันทึก</label>
                                                <input type="int" name="report_staff" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                            </div>
                                            <!-- /.form-group -->

                                            <!-- Date range -->
                                            <div class="form-group mt-5">
                                                <button type="submit" name="submit" value="submit" class="btn btn-success">Save</button>
                                            </div>
                                            <!-- /.form group -->
                                    </form>
                                </div>
                                <div class="card-footer">
                                    Visit <a href="https://getdatepicker.com/5-4/">tempusdominus </a> for more examples and information about
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