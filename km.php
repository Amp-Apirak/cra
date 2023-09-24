<!DOCTYPE html>
<html lang="en">
<?php $menu = "km"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRA | Knowledge</title>

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

        $result = $conn->query("DELETE FROM tb_km WHERE km_id=" . $_GET['id']);

        if ($result) { /* ถ้า ตัวแปล $result  เชื่อมต่อฐานข้อมูล อ่านค่าเรียบร้อยให้ประกาศ */
            // <!-- sweetalert -->
            echo '<script>
           setTimeout(function(){
               swal({
                   title: "Delect Successfully!",
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
                   title: "Can Not Delect Successfully!",
                   text: "Checking Your Data",
                   type:"warning"
               }, function(){
                   window.location = "km_is.php";
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
                        <h1>Knowledge</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Knowledge</li>
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
                        $_sqlService = "SELECT DISTINCT km_type FROM tb_km";
                        $_sqlGroup = "SELECT DISTINCT km_staff  FROM tb_km";
                        $_sqlSubGroup = "SELECT DISTINCT km_date  FROM tb_km";
                        $query_Service = mysqli_query($conn, $_sqlService);
                        $query_Group = mysqli_query($conn, $_sqlGroup);
                        $query_SubGroup = mysqli_query($conn, $_sqlSubGroup);
                        $_sql = "SELECT * FROM tb_km ";
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
                                    $_where = $_where . " WHERE km_date LIKE '%$search%'OR km_type LIKE '%$search%' OR km_staff LIKE '%$search%' km_subj LIKE '%$search%' OR km_re
                                 LIKE '%$search%'";
                                }
                            if ($dd_service != "00") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE km_type = '$dd_service' ";
                                } else {
                                    $_where = $_where . " AND km_type = '$dd_service'";
                                }
                            }
                            if ($dd_group != "00") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE km_staff = '$dd_group' ";
                                } else {
                                    $_where = $_where . " AND km_staff = '$dd_group'";
                                }
                            }
                            if ($dd_subgroup != "00") {
                                if (empty($_where)) {
                                    $_where = $_where . " WHERE km_date = '$dd_subgroup' ";
                                } else {
                                    $_where = $_where . " AND km_date = '$dd_subgroup'";
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
                        $_sql = $_sql . $_where . "" . " ORDER BY  km_id DESC";
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
                                            <form action="km.php" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <input type="text" class="form-control " id="searchservice" name="searchservice" value="<?php echo $search; ?>" placeholder="ค้นหา...">
                                                            <input type="hidden" class="form-control " id="searchOld" name="searchOld" value="<?php echo $search; ?>">
                                                            <input type="hidden" class="form-control " id="dd_serviceOld" name="dd_serviceOld" value="<?php echo $dd_service; ?>">
                                                            <input type="hidden" class="form-control " id="dd_groupOld" name="dd_groupOld" value="<?php echo $dd_group; ?>">
                                                            <input type="hidden" class="form-control " id="dd_subgroupOld" name="dd_subgroupOld" value="<?php echo $dd_subgroup; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group ">
                                                            <button type="submit" class="btn btn-primary" id="search" name="search">ค้นหา</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Type</label>
                                                            <select class="custom-select select2" name="dd_service">
                                                                <option value="00">--เลือก--</option>
                                                                <?php while ($res_ser = mysqli_fetch_array($query_Service)) { ?>
                                                                    <option value="<?php echo $res_ser["km_type"]; ?>" <?php if ($res_ser['km_type'] == $dd_service) : ?> selected="selected" <?php endif; ?>>
                                                                        <?php echo $res_ser["km_type"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Staff</label>
                                                            <select class="custom-select select2" name="dd_group">
                                                                <option value="00">--เลือก--</option>
                                                                <?php while ($res_s = mysqli_fetch_array($query_Group)) { ?>
                                                                    <option value="<?php echo $res_s["km_staff"]; ?>" <?php if ($res_s['km_staff'] == $dd_group) : ?> selected="selected" <?php endif; ?>>
                                                                        <?php echo $res_s["km_staff"]; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-group">
                                                            <label>Date</label>
                                                            <select class="custom-select select2" name="dd_subgroup">
                                                                <option value="00">--เลือก--</option>
                                                                <?php while ($res_sl = mysqli_fetch_array($query_SubGroup)) { ?>
                                                                    <option value="<?php echo $res_sl["km_date"]; ?>" <?php if ($res_sl['km_date'] == $dd_subgroup) : ?> selected="selected" <?php endif; ?>>
                                                                        <?php echo $res_sl["km_date"]; ?></option>
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
                            <a href="km_is.php" class="btn btn-success btn-sm float-right">เพิ่มข้อมูล<i class=""></i></a>
                        </div><br>


                        <div class="card">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <h3 class="card-title">Knowledge for CRA Project</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date </th>
                                            <th>Type</th>
                                            <th>Subject</th>
                                            <th>Staff</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while ($res_search = mysqli_fetch_array($query_search)) { ?>
                                            <tr id="myTable">
                                                <td><?php echo $res_search["km_date"]; ?></td>
                                                <td><span class="text-danger"><?php echo $res_search["km_type"]; ?></span></td>
                                                <td><?php echo $res_search["km_subj"]; ?></td>
                                                <td><?php echo $res_search["km_staff"]; ?></td>
                                                <td>


                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default<?php echo $res_search["km_id"]; ?>"><i class="fas fa-eye"></i></a>


                                                    <div class="modal fade" id="modal-default<?php echo $res_search["km_id"]; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title"><span class="text-danger"><?php echo $res_search["km_type"]; ?></span></h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><h6><span class="text-primary">หัวข้อ</p></span></h6>
                                                                    <p><?php echo $res_search["km_subj"]; ?></p>

                                                                    <p><h6><span class="text-primary">คู่มือ</p></span></h6>
                                                                    <p>
                                                                        <?php $lam = explode(PHP_EOL, $res_search["km_re"]);
                                                                        for ($i = 0; $i < count($lam); $i++) { ?>
                                                                            <?php echo $lam[$i]; ?></br>
                                                                        <?php } ?>
                                                                    </p>
                                                                    <p><h6><span class="text-primary">------------------------------------------------------------------------------------</p></span></h6>
                                                                    <p>ไฟล์ข้อมูล : <a href="../its/Km/<?php echo $res_search["upfile"]; ?>"><?php echo $res_search["upfile"]; ?></a></p>
                                                                    <p>ผู้สร้าง : <?php echo $res_search["km_staff"]; ?>
                                                                    </p>
                                                                    <p>วันที่ : <?php echo $res_search["km_date"]; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->


                                                    <a href="#" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="km.php?id=<?php echo $res_search["km_id"]; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                </td>

                                            </tr>
                                        <?php } ?>



                            </div>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date </th>
                                    <th>Type</th>
                                    <th>Subject</th>
                                    <th>Staff</th>
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