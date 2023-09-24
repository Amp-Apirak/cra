<!DOCTYPE html>
<html lang="en">
<?php $menu = "service"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRA | Open Service</title>


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
                        <h1>Open Service</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Open Service</li>
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

                            $service_cat  = $_POST['service_cat']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
                            $service_sub = $_POST['service_sub'];
                            $service_item = $_POST['service_item'];
                            $service_subjact = $_POST['service_subjact'];
                            $service_case = $_POST['service_case'];
                            $service_solve = $_POST['service_solve'];
                            $service_date = $_POST['service_date'];
                            $service_time = $_POST['service_time'];
                            $remark = $_POST['remark'];


                            print_r($_POST);

                            $sql =  "INSERT INTO `tb_service` (`service_id`, `service_cat`, `service_sub`, `service_item`, `service_subjact`, `service_case`, `service_solve`, `service_date`, `service_time`, `remark`) 
                            VALUES (NULL, '$service_cat', '$service_sub', '$service_item', '$service_subjact', '$service_case', '$service_solve', '$service_date', '$service_time', '$remark')";
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
                                                window.location = "service.php";
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
                                                window.location = "service_is.php";
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
                            <div class="col-md-8 mx-auto">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Service descriptions</h3>
                                    </div>

                                    <form action="#" method="POST" enctype="multipart/form-data">

                                        <div class="card-body">

                                            <!-- Date and time -->
                                            <div class="form-group">
                                                <label>Date and time:</label>
                                                <div class="input-group date">
                                                    <input type="text" value="<?php echo $date; ?>" name="service_date" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                                    <input type="text" value="<?= date("H:i:s") ?>" name="service_time" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Date and time -->


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Service</label>
                                                <input type="int" name="service_cat" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category</label>
                                                <input type="int" name="service_sub" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subcategory</label>
                                                <input type="int" name="service_item" class="form-control" id="exampleInputEmail1" placeholder="" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ปัญหา</label>
                                                <input type="text" name="service_subjact" class="form-control" id="exampleInputEmail1" placeholder="ระบุรายละเอียดเกี่ยวกับปัญหา" required>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">สาเหตุ</label>
                                                <input type="text" name="service_case" class="form-control" id="exampleInputEmail1" placeholder="ระบุรายละเอียดสาเหตุเกิดจาก" required>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">วิธีการแก้ไข</label>
                                                <input type="text" name="service_solve" class="form-control" id="exampleInputEmail1" placeholder="ระบุรายละเอียดการแก้ไขทำอะไรลงไปบ้าง" required>
                                            </div>
                                            <!-- /.form-group -->
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">เพิ่มเติม</label>
                                                <textarea class="form-control" name="remark" id="remark" rows="5" placeholder="ระบุรายละเอียดเพิ่มเติม อาทิ เบอร์ติดต่อประสานงาน หน่วยงาน หรืออื่นๆ......."></textarea required>
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
                                    Visit <a href="https://pointit.co.th">Point it consulting co. ltd  </a> for more examples and information about
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