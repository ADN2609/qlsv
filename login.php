<?php
include("php/dbconnect.php");

$error = '';
if(isset($_POST['login']))
{

$username =  mysqli_real_escape_string($conn,trim($_POST['username']));
$password =  mysqli_real_escape_string($conn,$_POST['password']);

if($username=='' || $password=='')
{
$error='Tất cả các mục yêu cầu';
}

$sql = "select * from user where username='".$username."' and password = '".md5($password)."'";

$q = $conn->query($sql);
if($q->num_rows==1)
{
$res = $q->fetch_assoc();
$_SESSION['rainbow_username']=$res['username'];
$_SESSION['rainbow_uid']=$res['id'];
$_SESSION['rainbow_name']=$res['name'];
echo '<script type="text/javascript">window.location="index.php"; </script>';

}else
{
$error = 'Sai Tài Khoản hoặc Mật Khẩu';
}

}

?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hệ thống quản lý học phí học sinh sinh viên</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<style>
.myhead{
margin-top:0px;
margin-bottom:0px;
text-align:center;
color: #d9cd6f;
}
</style>

</head>
<body >
    <div class="container">
        
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                          
                            <div class="panel-body" style="background-color: #3f826d; margin-top:50px; border:solid 3px #3f826d;">
							  <h5 class="myhead"><b>HỆ THỐNG QUẢN LÝ HỌC PHÍ HỌC SINH SINH VIÊN - DADC</b></h5>
                                <form role="form" action="login.php" method="post">
                                    <hr />
									<?php
									if($error!='')
									{									
									echo '<h5 class="text-danger text-center">'.$error.'</h5>';
									}
									?>
									
                                   
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Tài khoản của bạn " name="username" required />
                                        </div>
                                        
									<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Mật khẩu của bạn" name="password" required />
                                        </div>
										
                                    <div class="form-group">
                                           
                                            <span class="pull-right">
                                                   <a href="index.html" ><b>Quên mật khẩu ? </b></a>
                                            </span>
                                     </div>
                                     
                                     <button class="btn btn-primary" type= "submit" name="login">Đăng nhập ngay bây giờ</button>
                                   
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
