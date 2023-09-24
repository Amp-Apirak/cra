<!DOCTYPE html>
<html lang="en">
<?php $menu = "point"; ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRA | Point IT Contact</title>



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
                        <h1>Point IT</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Point IT</li>
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search</h3>
                            </div>
                            <!-- /.card-header (Search) -->
                            <div class="card-body">
                                <!-- Start Search -->
                                <section class="content">
                                    <div class="container-fluid">
                                        <form action="#" data-select2-id="1">
                                            <div class="row">
                                                <div class="col-md-10 mx-auto">
                                                    <div class="row">
                                                        <div class="col-4" data-select2-id="2">
                                                            <div class="form-group" data-select2-id="3">
                                                                <label>Sort Order Name:</label>
                                                                <select class="select2 select2-hidden-accessible"
                                                                    style="width: 100%;" data-select2-id="4"
                                                                    tabindex="-1" aria-hidden="true">
                                                                    <option selected="" data-select2-id="5"></option>
                                                                    <option data-select2-id="6">นายอภิรักษ์ บางพุก
                                                                    </option>
                                                                    <option data-select2-id="7">นายวัฒนชัย น้อยหล่อง
                                                                    </option>
                                                                </select><span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-4" data-select2-id="8">
                                                            <div class="form-group" data-select2-id="9">
                                                                <label>Sort Order Group:</label>
                                                                <select class="select2 select2-hidden-accessible"
                                                                    style="width: 100%;" data-select2-id="10"
                                                                    tabindex="-1" aria-hidden="true">
                                                                    <option selected="" data-select2-id="11">
                                                                    </option>
                                                                    <option data-select2-id="12">Point IT</option>
                                                                    <option data-select2-id="19">CRA</option>
                                                                </select><span></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-4" data-select2-id="13">
                                                            <div class="form-group" data-select2-id="14">
                                                                <label>Sort Order Position:</label>
                                                                <select class="select2 select2-hidden-accessible"
                                                                    style="width: 100%;" data-select2-id="15"
                                                                    tabindex="-1" aria-hidden="true">
                                                                    <option selected="" data-select2-id="16">
                                                                    </option>
                                                                    <option data-select2-id="17">Onsite</option>
                                                                    <option data-select2-id="20">Helpdesk</option>
                                                                </select><span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                                <!-- End Search -->
                            </div>
                            <!-- /.card-body (Search) -->
                        </div>
                        <!-- /.card (Search) -->

                        <div class="col-md-12 pb-3">
                            <a href="#" class="btn btn-success btn-sm float-right">เพิ่มข้อมูล<i class=""></i></a>
                        </div><br>



                        <div class="card">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <h3 class="card-title">Point IT for CRA Project</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Group</th>
                                            <th>Position</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>นายวัฒนชัย น้อยหล่อง</td>
                                            <td>Point IT</td>
                                            <td>Lead Teams Support</td>
                                            <td>0893565842</td>
                                            <td>Wattanacahi@pointit.co.th</td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm"><i
                                                        class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-info btn-sm"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Group</th>
                                            <th>Position</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th></th>
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