<!DOCTYPE html>
<html lang="en">
<?php $menu = "employee"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRA | Employee Contact</title>


    <!----------------------------- start header ------------------------------->
    <?php include ("../its/templated/head.php");?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include ("../its/templated/menu.php");?>
    <!----------------------------- end menu --------------------------------->

    <?php
    /* การลบข้อมูล */
    if (isset($_GET['id'])) {

        $result = $conn->query("DELETE FROM tb_employee WHERE id_employee=" . $_GET['id']);

        if ($result) {
            // <!-- sweetalert -->
            echo '<script>
                    setTimeout(function(){
                        swal({
                            title: "Delectd Successfully!",
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
                            title: "Can Not Delectd Successfully!",
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
    /* การลบข้อมูล */
    ?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Employee</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Employee</li>
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
    $tb_position = "";
    $tb_group = "";
    $tb_status = "";
    $tb_createdate = "";
    $search_backup = "";
    $tb_position_backup = "";
    $tb_group_backup = "";
    $tb_status_backup = "";
    $tb_createdate_backup = "";

    $_sql_position = "SELECT DISTINCT position FROM tb_employee";
    $_sql_group = "SELECT DISTINCT group_g FROM tb_employee";
    $_sql_status = "SELECT DISTINCT status_ac  FROM tb_employee";
    $_sql_createdate = "SELECT DISTINCT date_crt  FROM tb_employee";

    $query_position = mysqli_query($conn, $_sql_position);
    $query_group = mysqli_query($conn, $_sql_group);
    $query_status = mysqli_query($conn, $_sql_status);
    $query_createdate = mysqli_query($conn, $_sql_createdate);

    $_sql = "SELECT * FROM tb_employee";
    $_where = "";
    if (isset($_POST['search'])) {

        $search = $_POST['searchservice'];
        $tb_position = $_POST['position'];
        $tb_group = $_POST['group_g'];
        $tb_status = $_POST['status_ac'];
        $tb_createdate = $_POST['date_crt'];
        $search_backup = $_POST['search_backup'];
        $tb_position_backup = $_POST['tb_position_backup'];
        $tb_group_backup = $_POST['tb_group_backup'];
        $tb_status_backup = $_POST['tb_status_backup'];
        $tb_createdate_backup = $_POST['tb_createdate_backup'];
        // print_r($_sqlCount);

        if ($search != $search_backup || $tb_position != $tb_position_backup || $tb_group != $tb_group_backup || $tb_status  != $tb_status_backup || $tb_createdate  != $tb_createdate_backup )
        
        if (!empty($search)) {
            $_where = $_where . " WHERE id_employee LIKE '%$search%'OR name LIKE '%$search%' OR lastname LIKE '%$search%' OR position LIKE '%$search%' OR tel LIKE '%$search%' OR email LIKE '%$search%' OR site LIKE '%$search%'
            OR group_g LIKE '%$search%' OR status_ac LIKE '%$search%' OR status_emp LIKE '%$search%' OR date_crt LIKE '%$search%'";
        }
        if ($tb_position != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE position = '$tb_position' ";
            } else {
                $_where = $_where . " AND position = '$tb_position'";
            }
        }
        if ($tb_group != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE group_g = '$tb_group' ";
            } else {
                $_where = $_where . " AND group_g = '$tb_group'";
            }
        }
        if ($tb_status != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE status_ac = '$tb_status' ";
            } else {
                $_where = $_where . " AND  status_ac = '$tb_status'"; 
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
    

    $query_search = mysqli_query($conn, $_sql .$_where); 
// print_r($query_search);
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
                                            <form action="employee.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <input type="text" class="form-control " id="searchservice"
                                                                name="searchservice" value="<?php echo $search; ?>"
                                                                placeholder="ค้นหา...">
                                                            <input type="hidden" class="form-control "
                                                                id="search_backup" name="search_backup"
                                                                value="<?php echo $search; ?>">
                                                            <input type="hidden" class="form-control "
                                                                id="tb_position_backup" name="tb_position_backup"
                                                                value="<?php echo $tb_position; ?>">
                                                            <input type="hidden" class="form-control "
                                                                id="tb_group_backup" name="tb_group_backup"
                                                                value="<?php echo $tb_group; ?>">
                                                            <input type="hidden" class="form-control "
                                                                id="tb_status_backup" name="tb_status_backup"
                                                                value="<?php echo $tb_status; ?>">
                                                            <input type="hidden" class="form-control "
                                                                id="tb_createdate_backup" name="tb_createdate_backup"
                                                                value="<?php echo $tb_createdate; ?>">
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
                                                            <label>Position</label>
                                                            <select class="custom-select select2" name="position">
                                                                <option value="">เลือก</option>
                                                                <?php while ($r = mysqli_fetch_array($query_position)) { ?>
                                                                <option value="<?php echo $r["position"]; ?>"
                                                                    <?php if ($r['position'] == $tb_position) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $r["position"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Group</label>
                                                            <select class="custom-select select2" name="group_g">
                                                                <option value="">เลือก</option>
                                                                <?php while ($rg = mysqli_fetch_array($query_group)) { ?>
                                                                <option value="<?php echo $rg["group_g"]; ?>"
                                                                    <?php if ($rg['group_g'] == $tb_group) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rg["group_g"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="custom-select select2" name="status_ac">
                                                                <option value="">เลือก</option>
                                                                <?php while ($re = mysqli_fetch_array($query_status)) { ?>
                                                                <option value="<?php echo $re["status_ac"]; ?>"
                                                                    <?php if ($re['status_ac'] == $tb_status) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $re["status_ac"]; ?></option>
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
                            <a href="employee_is.php" class="btn btn-success btn-sm float-right">เพิ่มข้อมูล<i
                                    class=""></i></a>
                        </div><br>


                        <div class="card">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <h3 class="card-title">Employee for CRA Project</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Lastname</th>
                                            <th>Position</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Site</th>
                                            <th>Group</th>
                                            <th>Status</th>
                                            <th>Majer</th>
                                            <th>Create Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                        <tr id="myTable">
                                            <td><?php echo $res_search["name"]; ?></td>
                                            <td><?php echo $res_search["lastname"]; ?></td>
                                            <td><?php echo $res_search["position"]; ?></td>
                                            <td><?php echo $res_search["tel"];?></td>
                                            <td><?php echo $res_search["email"]; ?></td>
                                            <td><?php echo $res_search["site"]; ?></td>
                                            <td><?php echo $res_search["group_g"]; ?></td>
                                            <td><?php echo $res_search["status_ac"]; ?></td>
                                            <td><?php echo $res_search["status_emp"]; ?></td>
                                            <td><?php echo $res_search["date_crt"]; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm"><i
                                                        class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-info btn-sm"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="employee.php?id=<?php echo $res_search["id_employee"]; ?>" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>

                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Lastname</th>
                                            <th>Position</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Site</th>
                                            <th>Group</th>
                                            <th>Status</th>
                                            <th>Majer</th>
                                            <th>Create Date</th>
                                            <th>Action</th>
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