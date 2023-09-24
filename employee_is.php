<!DOCTYPE html>
<html lang="en">
<?php $menu = "employee"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRA | Open Employee</title>


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
                        <h1>Open Employee</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Open Employee</li>
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

                            $date_crt  = $_POST['date_crt']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
                            $status_ac = $_POST['status_ac'];
                            $name = $_POST['name'];
                            $lastname = $_POST['lastname'];
                            $position = $_POST['position'];
                            $tel = $_POST['tel'];
                            $email = $_POST['email'];
                            $site = $_POST['site'];
                            $group_g = $_POST['group_g'];
                            $status_emp = $_POST['status_emp'];


                            print_r($_POST);

                            $sql =  "INSERT INTO `tb_employee` (`id_employee`, `name`,`lastname`, `position`, `tel`, `email`, `site`, `group_g`, `status_ac`, `status_emp`, `date_crt`) 
                            VALUES (NULL, '$name', '$lastname', '$position', '$tel', '$email', '$site', '$group_g', '$status_ac', '$status_emp', '$date_crt')";
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
                                                window.location = "employee.php";
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
                                                window.location = "employee_is.php";
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date and time:</label>
                                                        <div class="input-group date">
                                                            <input type="text" value="<?php echo $date; ?>"
                                                                name="date_crt"
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
                                                    <div class="form-group" >
                                                        <label>Status</label>
                                                        <select class="form-control select2"  name="status_ac"
                                                            style="width: 100%;" required>
                                                            <option selected="selected"></option>
                                                            <option>Active</option>
                                                            <option>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">First Name</label>
                                                        <input type="int" name="name" class="form-control"
                                                            id="exampleInputEmail1" placeholder="" required>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Last Name</label>
                                                        <input type="int" name="lastname" class="form-control"
                                                            id="exampleInputEmail1" placeholder="" required>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" required>
                                                        <label>Site Support</label>
                                                        <select class="form-control select2" name="site"
                                                            style="width: 100%;" required>
                                                            <option selected="selected"></option>
                                                            <option>โรงพยาบาลจุฬาภรณ์ราชวิทยาลัย</option>
                                                            <option>โรงพยาบาลกรุงเทพสำนักงานใหญ่ (BHQ)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->

                                                <div class="col-md-6">
                                                    <div class="form-group" required>
                                                        <label>Company</label>
                                                        <select class="form-control select2" name="group_g"
                                                            style="width: 100%;" required>
                                                            <option selected="selected"></option>
                                                            <option>บริษัท พอยท์ ไอที คอนซัลทิ่ง จํากัด</option>
                                                            <option>โรงพยาบาลจุฬาภรณ์ราชวิทยาลัย</option>
                                                            <option>บริษัท ริโก้ (ประเทศไทย) จำกัด</option>
                                                            <option>บริษัท เลอโนโว (ประเทศไทย) จำกัด</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.form-group -->


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group" >
                                                        <label>Contract Status</label>
                                                        <select class="form-control select2" name="status_emp"
                                                            style="width: 100%;" required>
                                                            <option selected="selected"></option>
                                                            <option>พนักงานสัญญาจ้างชั่วคราว</option>
                                                            <option>พนักงานประจำ</option>
                                                        </select>
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
                                                            <input type="text" class="form-control" name="tel"
                                                                data-inputmask='"mask": "(999) 999-9999"' data-mask required>
                                                        </div>
                                                        <!-- /.input group -->
                                                    </div>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.form-group -->


                                            <p>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                                </div>
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