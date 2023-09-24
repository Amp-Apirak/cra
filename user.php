<!DOCTYPE html>
<html lang="en">
<?php $menu = "user"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRA | Users Contact</title>


    <!----------------------------- start header ------------------------------->
    <?php include ("../its/templated/head.php");?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include ("../its/templated/menu.php");?>
    <!----------------------------- end menu --------------------------------->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
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

    $search_backup = "";
    $tb_position_backup = "";
    $tb_group_backup = "";

    $_sql_position = "SELECT DISTINCT user_position FROM tb_user";
    $_sql_group = "SELECT DISTINCT user_status FROM tb_user";

    $query_position = mysqli_query($conn, $_sql_position);
    $query_group = mysqli_query($conn, $_sql_group);

    $_sql = "SELECT * FROM tb_user";
    $_where = "";
    if (isset($_POST['search'])) {

        $search = $_POST['searchservice'];
        $tb_position = $_POST['position'];
        $tb_group = $_POST['group_g'];

        $search_backup = $_POST['search_backup'];
        $tb_position_backup = $_POST['tb_position_backup'];
        $tb_group_backup = $_POST['tb_group_backup'];

        // print_r($_sqlCount);

        if ($search != $search_backup || $tb_position != $tb_position_backup || $tb_group != $tb_group_backup  )
        
        if (!empty($search)) {
            $_where = $_where . " WHERE user_id LIKE '%$search%'OR user_name LIKE '%$search%' OR user_position LIKE '%$search%' OR user_number LIKE '%$search%' OR user_ip LIKE '%$search%' OR user_status LIKE '%$search%' OR user_department LIKE '%$search%'
            OR user_details LIKE '%$search%' OR user_email LIKE '%$search%'";
        }
        if ($tb_position != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE user_position = '$tb_position' ";
            } else {
                $_where = $_where . " AND user_position = '$tb_position'";
            }
        }
        if ($tb_group != "") {
            if (empty($_where)) {
                $_where = $_where . " WHERE user_status = '$tb_group' ";
            } else {
                $_where = $_where . " AND user_status = '$tb_group'";
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
                                                                name="searchservice" value="<?php echo $search; ?>" placeholder="ค้นหา...">
                                                            <input type="hidden"  class="form-control " id="search_backup" name="search_backup" value="<?php echo $search; ?>" >
                                                            <input type="hidden"  class="form-control " id="tb_position_backup" name="tb_position_backup" value="<?php echo $tb_position; ?>" >
                                                            <input type="hidden"  class="form-control " id="tb_group_backup" name="tb_group_backup" value="<?php echo $tb_group; ?>" >
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
                                                            <label>Position</label>
                                                            <select class="custom-select select2" name="position">
                                                                <option value="">เลือก</option>
                                                                <?php while ($r = mysqli_fetch_array($query_position)) { ?>
                                                                <option value="<?php echo $r["user_position"]; ?>"
                                                                    <?php if ($r['user_position'] == $tb_position) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $r["user_position"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Status</label>
                                                            <select class="custom-select select2" name="group_g">
                                                                <option value="">เลือก</option>
                                                                <?php while ($rg = mysqli_fetch_array($query_group)) { ?>
                                                                <option value="<?php echo $rg["user_status"]; ?>"
                                                                    <?php if ($rg['user_status'] == $tb_group) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $rg["user_status"]; ?></option>
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
                            <a href="user_is.php" class="btn btn-success btn-sm float-right">เพิ่มข้อมูล<i
                                    class=""></i></a>
                        </div><br>


                        <div class="card">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <h3 class="card-title">User for CRA Project</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Department</th>
                                            <th>Create Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                        <tr id="myTable">
                                            <td><?php echo $res_search["user_name"]; ?></td>
                                            <td><?php echo $res_search["user_position"]; ?></td>
                                            <td><?php echo $res_search["user_number"]; ?></td>
                                            <td><?php echo $res_search["user_status"];?></td>
                                            <td><?php echo $res_search["email"]; ?></td>
                                            <td><?php echo $res_search["user_department"]; ?></td>          
                                            <td><?php echo $res_search["date_crt"]; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm"><i
                                                        class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-info btn-sm"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Department</th>
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