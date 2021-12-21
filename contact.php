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
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<?php
require_once "contact.php";
$m = new gm;
 
if( isset($_POST['submit']) ) {
    $hoten = trim( strip_tags( $_POST['hoten'] ) );
    $email = trim( strip_tags( $_POST['email'] ));
    $tieude = trim( strip_tags( $_POST['tieude'] ) );
    $thongdiep = trim( strip_tags( $_POST['thongdiep'] ) );
 
    //điền email nhận tại đây
    $to = "khoinguyengh69@gmail.com";
    $tieudethu = "Liên hệ từ $hoten";           
    $noidungthu = "
    <strong>Họ tên: </strong> $hoten<br/>
    <strong>Email: </strong> $email<br/>
    <strong>Tiêu đề: </strong> $tieude<br/>
    <strong>Thông điệp: </strong> $thongdiep<br/>
    <i>Thư được gửi từ liên hệ của website https://huynhthaihung.com</i>";
     
    //dùng mail test, đừng dùng mail chính thức
    $from = "your-email@yahoo.com";
 
    //pass email yahoo
    $p = "password";
    $m -> GuiMail($to, $from, $tennguoigui="Huynh Thai Hung", $tieudethu, $noidungthu, $from, $p, $error);
    if( $error != '' ) {
        $loi['guimail'] = "gửi mail không thành công";
    }else {
        $thanhcong['guimail'] = "gửi mail thành công";
    }
}
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
      <h1>Đăng ký quảng cáo</h1>
      <p>Bạn hãy cho chúng tôi biết về ý định hợp tác giữa chúng ta bằng cách điền tất cả thông tin dưới đây. Hãy dùng mail có thật bạn nhé. From FNO with LOVE <i class='fas fa-heart' style='font-size:12px;color:red'></i> </p>
      <img src="images/team.jpg">
    </div>
    <!-- end post -->
    <div id="comments">
      <div id="respond">
      <center>
		<h4 class="sent-notification"></h4>

		<form id="myForm">
			<h2>Đăng ký quảng cáo</h2>

			<label>Tên:</label>
			<input id="name" type="text" placeholder="Enter Name">
			<br><br>

			<label>Email:</label>
			<input id="email" type="text" placeholder="Enter Email">
			<br><br>

			<label>Tiêu đề"</label>
			<input id="subject" type="text" placeholder=" Enter Subject">
			<br><br>

			<label>Lời nhắn:</label>
			<textarea id="body" rows="5" placeholder="Type Message"></textarea><!--textarea tag should be closed (In this coding UI textarea close tag cannot be used)-->
			<br><br>

			<button type="submit" onclick="sendEmail()" value="Send An Email">Submit</button>
		</form>
	</center>
      </div>
    </div>
  </div>
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
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#hoten");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>
