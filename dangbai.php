<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Meganews - Contact</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="ie.css" /><![endif]-->
</head>
<body>
<?php
	include "config/config.php";
    function myautoload($classname)
    {
        include "classes/".$classname.".class.php";
    }
    spl_autoload_register("myautoload");
    $db=new Db();
    
?>

<!-- BEGIN wrapper -->
<div id="wrapper">
  <!-- BEGIN header -->
  <div id="header">
    <!-- begin logo -->
    <h1><a href="index.php">Meganews</a></h1>
    <!-- end logo -->
    <!-- begin advertisement -->
    <div class="ad"><a href="search.php"><img src="images/fno.png" alt="" /></a></div>
    <!-- end advertisement -->
    <!-- begin navigation -->
    <ul>
    <li><a href="index.php">Trang chủ</a></li>
      <li><a href="hot.php">Tin Hot</a></li>
      <li><a href="contact.php">Quảng cáo</a></li>
    </ul>
    <!-- end navigation -->
  </div>
  <!-- END header -->
  <!-- BEGIN content -->
  <div id="content">
    <!-- begin post -->
    <div class="single">
      <h1>Đăng bài mới</h1>
      <p>Bạn hãy cho chúng tôi biết thông tin về bài viết của bạn bằng cách điền tất cả thông tin dưới đây. Hãy dùng những thông tin có thật bạn nhé. From FNO with LOVE <i class='fas fa-heart' style='font-size:12px;color:red'></i> </p>
      <img src="images/team.jpg">
    </div>
    <!-- end post -->
    <div id="comments">
      <div id="respond">
      <center>
		<h4 class="sent-notification"></h4>

		<form action="#" method="post">
			<h2>Đăng bài</h2>

			<table>
            <tr><td>Mã bài:</td><td><input type="text" name="masach" /></td></tr>
            <tr><td>Tiêu đề:</td><td><input type="text" name="tensach" /></td></tr>
            <tr><td>Thông tin:</td><td><input type="text" name="mota" /></td></tr>
            <tr><td>Chọn 1 hình:</td><td><input type="file" name="hinh"/></td></tr>
            <tr><td>Mã người viết:</td><td><input type="text" name="manxb" /></td></tr>
            <tr><td>Mã loại:</td><td><input type="text" name="maloai" /></td></tr>
            </table>

			<input type="submit" name="sm" value="Submit" class="btn btn-primary">
		</form>
	</center>
      </div>
    </div>
  </div>
  <?php
  try{
$pdh = new PDO("mysql:host=localhost; dbname=nhasach"  , "root"  , ""  );
$pdh->query("  set names 'utf8'"  );
}
catch(Exception $e){
		echo $e->getMessage(); exit;
}

if (isset($_POST["sm"]))
{
	$sql="insert into sach(masach,tensach, mota, hinh, manxb, maloai) values(:masach,:tensach, :mota,:hinh , :manxb, :maloai) ";
	$arr = array(":masach"=>$_POST["masach"],":tensach"=>$_POST["tensach"],":mota"=>$_POST["mota"],":hinh"=>$_POST["hinh"],":manxb"=>$_POST["manxb"],":maloai"=>$_POST["maloai"]);
	$stm= $pdh->prepare($sql);
	$stm->execute($arr);
	$n = $stm->rowCount();
	if ($n>0) echo "Đã thêm $n bài viết ";
	else echo "Lỗi thêm ";
}

?>
  <!-- END content -->
  <!-- BEGIN sidebar -->
  <div id="sidebar">
    <!-- begin search -->
    <div class="search box">
      <form action="#">
        <input type="text" name="s" id="s" value="" />
        <button type="submit">Search</button>
      </form>
    </div>
    <!-- end search -->
    <!-- begin advertisement -->
    <div class="ad box"> <a href="#"><img src="images/2ae.jpg" alt="" /></a> <a href="#"><img src="images/tbq.jpg" alt="" /></a> <a href="#"><img src="images/nam.jpg" alt="" /></a> <a href="#"><img src="images/tonf.jpg" alt="" /></a> </div>
    <!-- end advertisement -->
    <!-- begin popular posts -->
    <div class="box">
      <h2>Popular Posts</h2>
      <ul>
        <li><a href="#">Sed tempor, orci a suscipit dapibus, lacus justo</a></li>
        <li><a href="#">Laoreet imperdiet Cras placerat suscipit purus</a></li>
        <li><a href="#">Quisque iaculis gravida mauris Donec elit</a></li>
        <li><a href="#">In vulputate sem quis metus Ut convallis</a></li>
        <li><a href="#">Proin convallis turpis sed dui Sed at velit eu felis</a></li>
        <li><a href="#">Luisque iaculis gravida mauris Donec elit ipsum</a></li>
      </ul>
    </div>
    <!-- end popular posts -->
    <!-- begin flickr photos -->
    
    <!-- end featured video -->
    <!-- BEGIN left -->
    
      <!-- end archives -->
      <!-- begin meta -->
      
      <!-- end meta -->
    </div>
    <!-- END right -->
  </div>
  <!-- END sidebar -->
  <div class="break"></div>
  <!-- BEGIN footer -->
  <div id="footer">
    <p class="l">Copyright &copy; 2021 - <a href="#">Jayden News</a> &middot; All Rights Reserved</p>
    <p class="r">Template by: <a href="http://www.wpthemedesigner.com/">WordPress Designer</a> | Get More <a href="#">Free CSS Templates</a></p>
  </div>
  <!-- END footer -->
</div>
<!-- END wrapper -->


</body>
</html>
