<!DOCTYPE html>
<html lang="en">
<?php $menu = "km"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRA | Open Knowledge</title>


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
                        <h1>Open Knowledge</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Open Knowledge</li>
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

                            $km_date  = $_POST['km_date']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
                            $km_type = $_POST['km_type'];
                            $km_subj = $_POST['km_subj'];
                            $km_re = $_POST['km_re'];
                            $km_link = $_POST['km_link'];
                            $km_staff = $_POST['km_staff'];

                            $upfile = $_POST['upfile'];


                            $upfile = $_FILES['upfile']['name'];
                            $file_tmp = $_FILES['upfile']['tmp_name'];
                            move_uploaded_file($file_tmp, "../its/Km/$upfile");


                            

                            $sql =  "INSERT INTO `tb_km` (`km_id`, `km_date`,`km_type`, `km_subj`, `km_re`, `upfile`, `km_staff`) 
                            VALUES (NULL, '$km_date', '$km_type', '$km_subj', '$km_re', '$upfile', '$km_staff')";
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
                                                window.location = "km.php";
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
                                                window.location = "km_is.php";
                                            })
                                        },1000);
                                    </script>';
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
                            <div class="col-md-12 ">
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
                                                    <input type="text" value="<?php echo $date; ?>" name="km_date" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Date and time -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ประเภท</label>
                                                <input type="int" name="km_type" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">หัวข้อเรื่อง</label>
                                                <input type="int" name="km_subj" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                            </div>
                                            <!-- /.form-group -->


                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label>สร้างคู่มือ</label>
                                                <textarea class="form-control" name="km_re" id="km_re" rows="10" placeholder="อธิบายวิธีใช้งาน คู่มือ หรือวิธีแก้ไขเป็นขั้นตอน......."></textarea required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Link Form Drive</label>
                                                <input type="int" name="km_link" class="form-control" id="exampleInputEmail1" placeholder="">
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">แนบเอกสาร</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="upfile"
                                                        name="upfile" required>
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ผู้บันทึก</label>
                                                <input type="int" name="km_staff" class="form-control"
                                                    id="exampleInputEmail1" placeholder="" required>
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