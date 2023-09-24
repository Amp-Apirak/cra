<!-- sweetalert -->
<?php 
    echo'
<script src="../its/code/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
';
?>



<?php
    session_start();
        if (isset($_POST['member_username'])){

            include("../connection/connection.php"); 
              // เชื่อมต่อฐานข้อมูล

          $member_username = $_POST['member_username'];
          $member_password = md5($_POST['member_password']); 
          // รับค่า Username and password //เข้ารหัสผ่านแบบ md5

          //Query เรียกฐานข้อมูลขึ้นมาตรวจสอบ
          $sql="SELECT * FROM tb_member 
          WHERE member_username='".$member_username."'
          AND member_password='".$member_password."' ";

        // ตรวจสอบการรับค่าจากตัวแปล $SQL   
            // echo $sql;
            // exit;


          $result = mysqli_query($conn,$sql);

          //ตรวจสอบหากรับค่าจาก Form กรอกข้อมูล Username/Password = 1 แต่ถ้าไม่จะได้เท่ากับ 0 
            // echo mysqli_num_rows($result);
            // exit;

            if(mysqli_num_rows($result)==1){

                $row = mysqli_fetch_array($result);

                $_SESSION['member_id'] = $row["member_id"];
                $_SESSION['member_username'] = $row["member_username"];
                $_SESSION['member_role'] = $row["member_role"];
                $_SESSION['member_name'] =   $row["member_name"]." ".$row["member_lastname"];
              

                 if($_SESSION['member_role'] =="Administrator"){
                        echo '<script>
                        setTimeout(function(){
                            swal({
                                title: "Login Successfully!",
                                text: "Welcome To Administrator for use systems. ",
                                type:"success"
                            }, function(){
                                window.location = "../index.php";
                            })
                        },1000);
                        </script>';
                        // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";
                    }

                 if($_SESSION['member_role'] =="User"){
                // <!-- sweetalert -->
                echo '<script>
                        setTimeout(function(){
                            swal({
                                title: "Login Successfully!",
                                text: "Welcome To user for use systems. ",
                                type:"success"
                            }, function(){
                                window.location = "../index.php";
                            })
                        },1000);
                        </script>';
                // echo "<script>alert('ยินดีตอนรับ Admin เข้าสู่ระบบ'); window.location='../index.php'</script>";

                 }
            }else{
                // <!-- sweetalert -->
                echo '<script>
                        setTimeout(function(){
                            swal({
                                title: "Login Error!",
                                text: "Username or Password is not correct, please try again.",
                                type:"warning"
                            }, function(){
                                window.location = "../login.php";
                            })
                        },1000);
                        </script>';
                // echo "<script>alert('Username Or Password ไม่ถูกต้อง'); window.location='../login.php'</>";
                // //แจังเดือนUsername/Password ไม่ถูกต้อง
            }


        }else{

            echo "<script>alert('Username Or Password ไม่ถูกต้อง'); window.location='../login.php'</script>";
            //หากใส่ Username/Password ไม่ถูกต้องให้กลับไปยังหน้า Login
        }
    
?>