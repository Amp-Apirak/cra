<!DOCTYPE html>
<html lang="en">
<?php $menu = "service"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRA | Sevice</title>

    <!-- highlight -->
    <style>
    .highlight {
        background-color: #FFFF88;
    }
    </style>
    <!-- highlight -->


    <!----------------------------- start header ------------------------------->
    <?php include("../its/templated/head.php"); ?>
    <!----------------------------- end header --------------------------------->

    <!----------------------------- start menu ------------------------------->
    <?php include("../its/templated/menu.php"); ?>
    <!----------------------------- end menu --------------------------------->

    <?php
    /* การลบข้อมูล */
    if (isset($_GET['id'])) {

        $result = $conn->query("DELETE FROM tb_service WHERE service_id=" . $_GET['id']);

        if ($result) { /* ถ้า ตัวแปล $result  เชื่อมต่อฐานข้อมูล อ่านค่าเรียบร้อยให้ประกาศ */
            // <!-- sweetalert -->
            echo '<script>
           setTimeout(function(){
               swal({
                   title: "Delect Successfully!",
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
                   title: "Can Not Delect Successfully!",
                   text: "Checking Your Data",
                   type:"warning"
               }, function(){
                   window.location = "service.php";
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
                        <h1>Sevice</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Sevice</li>
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
                        $dd_service = "00";
                        $dd_group = "00";
                        $dd_subgroup = "00";
                        // $npage = "1";
                        $searchOld = "";
                        $dd_serviceOld = "";
                        $dd_groupOld = "";
                        $dd_subgroupOld = "";
                        // $limit_page = "15";
                        $_sqlService = "SELECT DISTINCT service_cat FROM tb_service";
                        $_sqlGroup = "SELECT DISTINCT service_sub  FROM tb_service";
                        $_sqlSubGroup = "SELECT DISTINCT service_item  FROM tb_service";
                        $query_Service = mysqli_query($conn, $_sqlService);
                        $query_Group = mysqli_query($conn, $_sqlGroup);
                        $query_SubGroup = mysqli_query($conn, $_sqlSubGroup);
                        $_sql = "SELECT * FROM tb_service ";
                        // $_sqlCount = "SELECT COUNT(*) as count FROM tb_service ";
                        $_where = "";
                        // print_r($_sqlCount);
                        if (isset($_POST['search'])) {

                            $search  = $_POST['searchservice'];
                            $dd_service = $_POST['dd_service'];
                            $dd_group = $_POST['dd_group'];
                            $dd_subgroup = $_POST['dd_subgroup'];
                            // $npage = $_POST['npage'];
                            $searchOld  = $_POST['searchOld'];
                            $dd_serviceOld = $_POST['dd_serviceOld'];
                            $dd_groupOld = $_POST['dd_groupOld'];
                            $dd_subgroupOld = $_POST['dd_subgroupOld'];

                            if ($search != $searchOld || $dd_service != $dd_serviceOld || $dd_group != $dd_groupOld || $dd_subgroup  != $dd_subgroupOld)

                                if (!empty($search)) {
                                    $_where = $_where . " WHERE service_cat LIKE '%$search%'OR service_sub LIKE '%$search%' OR service_item LIKE '%$search%' OR service_subjact LIKE '%$search%' OR service_case LIKE '%$search%' OR service_solve 
                                 LIKE '%$search%'";
                                }
                            if ($dd_service != "00") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE service_cat = '$dd_service' ";
                                } else {
                                    $_where = $_where . " AND service_cat = '$dd_service'";
                                }
                            }
                            if ($dd_group != "00") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE service_sub = '$dd_group' ";
                                } else {
                                    $_where = $_where . " AND service_sub = '$dd_group'";
                                }
                            }
                            if ($dd_subgroup != "00") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE service_item = '$dd_subgroup' ";
                                } else {
                                    $_where = $_where . " AND service_item = '$dd_subgroup'";
                                }
                            }
                        }
                        //print_r($_sql . $_where); 

                        // $limit = 0;
                        // if ($npage == 1) {
                        //     $limit = 0;
                        // } elseif ($npage == 2) {
                        //     $limit = $limit_page;
                        // } else {
                        //     $limit = $limit_page * ($npage - 1);
                        // }
                        // $_sql = $_sql . $_where . "" . "ORDER BY service_id DESC LIMIT ";
                        // print_r("_sql : " . $_sql);
                        // $query_Count = mysqli_query($conn, $_sqlCount . $_where);
                        // $res_Count = mysqli_fetch_array($query_Count);
                        // $countt = $res_Count['count'];
                        // //print_r("countt : ".$countt);
                        // $ceiled = ceil($countt / $limit_page);
                        // //print_r("Count : ".$ceiled);
                        // $page = $npage;
                        // $num_page = $ceiled;
                        $_sql = $_sql . $_where . "" . " ORDER BY  service_id DESC";
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
                                            <form action="service.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <input type="text" class="form-control " id="searchservice"
                                                                name="searchservice" value="<?php echo $search; ?>"
                                                                placeholder="ค้นหา...">
                                                            <input type="hidden" class="form-control " id="searchOld"
                                                                name="searchOld" value="<?php echo $search; ?>">
                                                            <input type="hidden" class="form-control "
                                                                id="dd_serviceOld" name="dd_serviceOld"
                                                                value="<?php echo $dd_service; ?>">
                                                            <input type="hidden" class="form-control " id="dd_groupOld"
                                                                name="dd_groupOld" value="<?php echo $dd_group; ?>">
                                                            <input type="hidden" class="form-control "
                                                                id="dd_subgroupOld" name="dd_subgroupOld"
                                                                value="<?php echo $dd_subgroup; ?>">
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
                                                            <label>Service</label>
                                                            <select class="custom-select select2" name="dd_service">
                                                                <option value="00">--เลือก--</option>
                                                                <?php while ($res_ser = mysqli_fetch_array($query_Service)) { ?>
                                                                <option value="<?php echo $res_ser["service_cat"]; ?>"
                                                                    <?php if ($res_ser['service_cat'] == $dd_service) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $res_ser["service_cat"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Category</label>
                                                            <select class="custom-select select2" name="dd_group">
                                                                <option value="00">--เลือก--</option>
                                                                <?php while ($res_s = mysqli_fetch_array($query_Group)) { ?>
                                                                <option value="<?php echo $res_s["service_sub"]; ?>"
                                                                    <?php if ($res_s['service_sub'] == $dd_group) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $res_s["service_sub"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Subcategory</label>
                                                            <select class="custom-select select2" name="dd_subgroup">
                                                                <option value="00">--เลือก--</option>
                                                                <?php while ($res_sl = mysqli_fetch_array($query_SubGroup)) { ?>
                                                                <option value="<?php echo $res_sl["service_item"]; ?>"
                                                                    <?php if ($res_sl['service_item'] == $dd_subgroup) : ?>
                                                                    selected="selected" <?php endif; ?>>
                                                                    <?php echo $res_sl["service_item"]; ?></option>
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
                            <a href="service_is.php" class="btn btn-success btn-sm float-right">เพิ่มข้อมูล<i
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
                                            <th>Service</th>
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Problem</th>
                                            <th>Case</th>
                                            <th>Resolution</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                        <tr id="myTable">
                                            <td><?php echo $res_search["service_cat"]; ?></td>
                                            <td><?php echo $res_search["service_sub"]; ?></td>
                                            <td><?php echo $res_search["service_item"]; ?></td>
                                            <td><?php echo $res_search["service_subjact"]; ?></td>
                                            <td><?php echo $res_search["service_case"]; ?></td>
                                            <td><?php echo $res_search["service_solve"]; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm"><i
                                                        class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-info btn-sm"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="service.php?id=<?php echo $res_search["service_id"]; ?>"
                                                    class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>

                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Service</th>
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Problem</th>
                                            <th>Case</th>
                                            <th>Resolution</th>
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
    <?php include("../its/templated/footer.php"); ?>
    <!----------------------------- end menu --------------------------------->

    <!-- highlight -->
    <script src="code/dist/js/highlight.js">
    $("#myTable tr").highlight("<?php echo $search; ?>");
    </script>
    <!-- highlight -->