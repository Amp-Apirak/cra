<!DOCTYPE html>
<html lang="en">
<?php $menu = "ticket"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRA | Ticket Contact</title>


    <!----------------------------- start header ------------------------------->
    <?php include ("../its/templated/head.php");?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include ("../its/templated/menu.php");?>
    <!----------------------------- end menu --------------------------------->



    <?php
    /* การลบข้อมูล */
    if (isset($_GET['id'])) {

        $result = $conn->query("DELETE FROM tb_ticket WHERE id_ticket=" . $_GET['id']);

        if ($result) { /* ถ้า ตัวแปล $result  เชื่อมต่อฐานข้อมูล อ่านค่าเรียบร้อยให้ประกาศ */
            // <!-- sweetalert -->
            echo '<script>
           setTimeout(function(){
               swal({
                   title: "Delect Successfully!",
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
                   title: "Can Not Delect Successfully!",
                   text: "Checking Your Data",
                   type:"warning"
               }, function(){
                   window.location = "ticket.php";
               })
           },1000);
       </script>';
            // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
        }
    }
    /* การลบข้อมูล */
    ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ticket</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Ticket</li>
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



                        <!-- Start ค้นหาและ ดึงข้อมูล -->
<?php
    $search = "";
    $tb_staff = "";
    $tb_status = "";
    $tb_createdate = "";

    $search_backup = "";
    $tb_staff_backup = "";
    $tb_status_backup = "";
    $tb_createdate_backup = "";

    $_sql_staff = "SELECT DISTINCT id_name FROM tb_ticket";
    $_sql_status = "SELECT DISTINCT status_ticket  FROM tb_ticket";
    $_sql_createdate = "SELECT DISTINCT date_crt  FROM tb_ticket";

    $query_staff = mysqli_query($conn, $_sql_staff);
    $query_status = mysqli_query($conn, $_sql_status);
    $query_createdate = mysqli_query($conn, $_sql_createdate);

    $_sql = "SELECT * FROM tb_ticket";
    $_where = "";
    if (isset($_POST['search'])) {

        $search = $_POST['searchservice'];
        $tb_staff = $_POST['id_name'];
        $tb_status = $_POST['status_ticket'];
        $tb_createdate = $_POST['date_crt'];

        $search_backup = $_POST['search_backup'];
        $tb_staff_backup = $_POST['tb_staff_backup'];
        $tb_status_backup = $_POST['tb_status_backup'];
        $tb_createdate_backup = $_POST['tb_createdate_backup'];
        // print_r($tb_staff_backup);

        if ($search != $search_backup || $tb_staff != $tb_staff_backup || $tb_status  != $tb_status_backup || $tb_createdate  != $tb_createdate_backup )
        
        if (!empty($search)) {
            $_where = $_where . " WHERE id_ticket LIKE '%$search%'OR status_ticket LIKE '%$search%' OR id_name LIKE '%$search%' OR tiket_number LIKE '%$search%' OR tel_ticket LIKE '%$search%' OR name_ticket LIKE '%$search%' OR ip_ticket LIKE '%$search%'
            OR problems LIKE '%$search%' OR cause LIKE '%$search%' OR resolve LIKE '%$search%' OR remark LIKE '%$search%'OR date_crt LIKE '%$search%'";
        }
        if ($tb_staff != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE id_name = '$tb_staff' ";
            } else {
                $_where = $_where . " AND id_name = '$tb_staff'";
            }
        }
        if ($tb_status != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE status_ticket = '$tb_status' ";
            } else {
                $_where = $_where . " AND  status_ticket = '$tb_status'"; 
            }
        }
        if ($tb_createdate != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE date_crt = '$tb_createdate' ";
            } else {
                $_where = $_where . " AND date_crt = '$tb_createdate'";
            }
        }
    }
    
    $_sql = $_sql . $_where . "" . " ORDER BY  date_crt DESC";
    $query_search = mysqli_query($conn, $_sql); 
// print_r($_sql);
    ?>

                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header ">
                                            <h3 class="card-title font1">
                                                ค้นหา
                                            </h3>
                                        </div>
                                        <div class="card-body">
                                            <form action="ticket.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <input type="text" class="form-control " id="searchservice" name="searchservice" value="<?php echo $search; ?>" placeholder="ค้นหา...">
                                                            <input type="hidden"  class="form-control " id="search_backup" name="search_backup" value="<?php echo $search; ?>" >
                                                            <input type="hidden"  class="form-control " id="tb_staff_backup" name="tb_staff_backup" value="<?php echo $tb_staff; ?>" >  
                                                            <input type="hidden"  class="form-control " id="tb_status_backup" name="tb_status_backup" value="<?php echo $tb_status; ?>" >
                                                            <input type="hidden"  class="form-control " id="tb_createdate_backup" name="tb_createdate_backup" value="<?php echo $tb_createdate; ?>" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <button type="submit" class="btn btn-primary" id="search"
                                                                name="search">ค้นหา</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Staff</label>
                                                            <select class="custom-select select2" name="id_name">
                                                                <option value="">เลือก</option>
                                                                <?php while ($r = mysqli_fetch_array($query_staff)) { ?>
                                                                <option value="<?php echo $r["id_name"]; ?>"
                                                                    <?php if ($r['id_name'] == $tb_staff) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $r["id_name"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="custom-select select2" name="status_ticket">
                                                            <option value="">เลือก</option>
                                                                <?php while ($re = mysqli_fetch_array($query_status)) { ?>
                                                                <option value="<?php echo $re["status_ticket"]; ?>" 
                                                                    <?php if ($re['status_ticket'] == $tb_status) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $re["status_ticket"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Create Date</label>
                                                            <select class="custom-select select2" name="date_crt">
                                                                <option value="">เลือก</option>
                                                                <?php while ($rl = mysqli_fetch_array($query_createdate)) { ?>
                                                                <option value="<?php echo $rl["date_crt"]; ?>"
                                                                    <?php if ($rl['date_crt'] == $tb_createdate) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rl["date_crt"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                </div>
                        </section>

                        <div class="col-md-12 pb-3">
                            <a href="ticket_is.php" class="btn btn-success btn-sm float-right">เพิ่มข้อมูล<i
                                    class=""></i></a>
                        </div><br>


                        <div class="card">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <h3 class="card-title">All Ticket </h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date Craeted</th>
                                            <th>Time</th>
                                            <th>Staff</th>
                                            <th>Status</th>
                                            <th>Ticket ID</th>
                                            <th>Ploblems</th>
                                            <th>IP Remote</th>
                                            <th>Customer</th>
                                            <th>Phone</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                        <tr id="myTable">
                                            <td><?php echo $res_search["date_crt"]; ?></td>
                                            <td><?php echo $res_search["date_time"]; ?></td>
                                            <td><?php echo $res_search["id_name"]; ?></td>
                                            <td><?php echo $res_search["status_ticket"];?></td>
                                            <td><?php echo $res_search["tiket_number"]; ?></td>
                                            <td><?php echo $res_search["problems"]; ?></td>
                                            <td><?php echo $res_search["ip_ticket"]; ?></td>          
                                            <td><?php echo $res_search["name_ticket"]; ?></td>
                                            <td><?php echo $res_search["tel_ticket"]; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm"><i
                                                        class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-info btn-sm"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="ticket.php?id=<?php echo $res_search["id_ticket"]; ?>" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Date Craeted</th>
                                            <th>Time</th>
                                            <th>Staff</th>
                                            <th>Status</th>
                                            <th>Ticket ID</th>
                                            <th>Ploblems</th>
                                            <th>IP Remote</th>
                                            <th>Customer</th>
                                            <th>Phone</th>
                                            <th>#</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!----------------------------- start menu ------------------------------->
    <?php include ("../its/templated/footer.php");?>
    <!----------------------------- end menu --------------------------------->

    <!-- highlight -->
    <script src="code/dist/js/highlight.js"></script>

    <script>
    $("#myTable tr").highlight();
    </script>
    <!-- highlight -->