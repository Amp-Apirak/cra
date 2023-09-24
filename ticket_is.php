<!DOCTYPE html>
<html lang="en">
<?php $menu = "ticket"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRA | Open tiket</title>


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
                        <h1>Open Tiket</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Open Tiket</li>
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

                        <!-- ดึงข้อมูลชื่อเจ้าหน้าที่ Select2 -->
                        <?php
                        $tb_name = "";
                        $_sql_name = "SELECT DISTINCT name FROM tb_employee";
                        $query_name = mysqli_query($conn, $_sql_name);

                        ?>
                        <!-- ดึงข้อมูลชื่อเจ้าหน้าที่ Select2 -->

                        <!-- เพิ่มข้อมูล -->
                        <?php
                        if (isset($_POST['submit'])) { /* ถ้า POST มีการกด Submit ให้ทำส่วนล่าง */

                            $status_ticket  = $_POST['status_ticket']; /* ประกาศตัวแปลเก็บค่า  POST ที่รับมาจาก INPUT  */
                            $id_name = $_POST['id_name'];
                            $tiket_number = $_POST['tiket_number'];
                            $tel_ticket = $_POST['tel_ticket'];
                            $name_ticket = $_POST['name_ticket'];
                            $ip_ticket = $_POST['ip_ticket'];
                            $problems = $_POST['problems'];
                            $resolve = $_POST['resolve'];
                            $cause = $_POST['cause'];
                            $remark = $_POST['remark'];
                            $date_time = $_POST['date_time'];
                            $date_crt = $_POST['date_crt'];

                            print_r($_POST);

                            $sql =  "INSERT INTO `tb_ticket` (`id_ticket`, `status_ticket`, `id_name`, `tiket_number`, `tel_ticket`, `name_ticket`, `ip_ticket`, `problems`, `cause`, `resolve`, `remark`, `date_crt`, `date_time`) 
                            VALUES (NULL, '$status_ticket', '$id_name', '$tiket_number', '$tel_ticket', '$name_ticket', '$ip_ticket', '$problems', '$cause', '$resolve', '$remark', '$date_crt','$date_time')";
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
                                                window.location = "ticket.php";
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
                                                window.location = "ticket_is.php";
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
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Job descriptions</h3>
                                    </div>

                                    <form action="#" method="POST" enctype="multipart/form-data">

                                        <div class="card-body">

                                            <!-- Date and time -->
                                            <div class="form-group">
                                                <label>Date and time:</label>
                                                <div class="input-group date" >
                                                    <input type="text" value="<?php echo $date; ?>" name="date_crt" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                                    <input type="text" value="<?=date("H:i:s")?>" name="date_time" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Date and time -->

                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control select2" name="status_ticket" style="width: 100%;" required>
                                                    <option selected="selected"></option>
                                                    <option>ติดตามงาน</option>
                                                    <option>แจ้งเปิดงานใหม่</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">IT Request</label>
                                                <input type="int" name="tiket_number" class="form-control" id="exampleInputEmail1" placeholder="หมายเลขงาน" required>
                                            </div>
                                            <!-- /.form-group -->

                                            <!-- IP mask -->
                                            <div class="form-group">
                                                <label>IP Remote:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-laptop"></i></span>
                                                    </div>
                                                    <input type="text" name="ip_ticket" class="form-control" data-inputmask="'alias': 'ip'" data-mask>
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                            <!-- /.form group -->


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Customer Name</label>
                                                <input type="text" name="name_ticket" class="form-control" id="exampleInputEmail1" placeholder="ชื่อผู้รับบริการ" required>
                                            </div>
                                            <!-- /.form-group -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Phone number</label>
                                                <input type="text" name="tel_ticket" class="form-control" id="exampleInputEmail1" placeholder="เบอร์ติดต่อ" required>
                                            </div>
                                            <!-- /.form-group -->

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
                            <!-- /.col (left) -->
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Service descriptions</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ปัญหา</label>
                                            <input type="text" name="problems" class="form-control" id="exampleInputEmail1" placeholder="ระบุรายละเอียดเกี่ยวกับปัญหา">
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">สาเหตุ</label>
                                            <input type="text" name="cause" class="form-control" id="exampleInputEmail1" placeholder="ระบุรายละเอียดสาเหตุเกิดจาก">
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ปัญหาเกี่ยวกับ</label>
                                            <input type="text" name="resolve" class="form-control" id="exampleInputEmail1" placeholder="ระบุรายละเอียดการแก้ไขทำอะไรลงไปบ้าง">
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">อธิบายเพิ่มเติม</label>
                                            <input type="text" name="remark" class="form-control" id="exampleInputEmail1" placeholder="ระบุรายละเอียด">
                                        </div>
                                        <!-- /.form-group -->

                                        <div class="form-group">
                                            <label>Helpdesk by</label>
                                            <select class="form-control select2" name="id_name" style="width: 100%;">
                                                <option value="">เลือก</option>
                                                <?php while ($r = mysqli_fetch_array($query_name)) { ?>
                                                    <option value="<?php echo $r["name"]; ?>" <?php if ($r['name'] == $tb_name) : ?> selected="selected" <?php endif; ?>>
                                                        <?php echo $r["name"]; ?></option>
                                                <?php } ?>
                                            </select>
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
                            </div>
                            <!-- /.card -->
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