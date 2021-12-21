<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Manga News</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<!--[if lte IE 6]><link rel="stylesheet" type="text/css" href="ie.css" /><![endif]-->
</head>
<body>
	<?php
  include "include/function.php";
	include "config/config.php";
    function myautoload($classname)
    {
        include "classes/".$classname.".class.php";
    }
    spl_autoload_register("myautoload");
    $db=new Db();
    $search 	= postIndex("search");
    $sachDB=new Sach();
    $sachs=$sachDB->hot();
?>

<!-- BEGIN wrapper -->
<div id="wrapper">
  <!-- BEGIN header -->
  <div id="header">
    <!-- begin logo -->
    <h1><a href="index.php"></a></h1>
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
    <!-- BEGIN ROW -->
    <!-- begin post -->
    
    
    <?php 
            $mod="sach";
            if(isset($_REQUEST['mod']))
                $mod=$_REQUEST['mod'];
            if($mod=="cart")
                include 'cart.php';
            else
                include "tinhot.php"; ?>
    
  </div>
  <!-- END content -->
  <!-- BEGIN sidebar -->
  <div id="sidebar">
  <div class="search box">
      <form action="index.php?mod=search&proname=<?php echo $search;?>" method="post">
        <input type="text" name="search" />
        <button type="submit" name="ok">Search</button>
      </form>
    </div>
    <?php
    if (isset($_POST['ok'])) 
    {
        if (empty($search)) {
            echo "Yeu cau nhap du lieu vao o trong";
        } 
        else{
            include "mod.php";
        }
    }

    ?>
    <!-- end search -->
    <!-- begin advertisement -->
    
    <!-- end advertisement -->
    <!-- begin popular posts -->
    <div class="box">
      <h2>Popular Posts</h2>
      <ul>
        <?php
          
          foreach($sachs as $sach)
                {
                ?>
                    <li><a href="index.php?loai=<?php echo $sach['masach']; ?>"><?php echo $sach['tensach']; ?></a></li>
                <?php } ?>
            
        
      </ul>
    </div >
    <!-- end popular posts -->
    
    <!-- BEGIN left -->
    
      <!-- begin categories -->
      
      <!-- end categories -->
      <!-- begin blogroll -->
      <div class="box">
      <h2 style="text-align:center">HOT NEWS <i class='fas fa-fire' style='font-size:16px ;color:red'></i></h2>
      <?php foreach($sachs as $sach1)
      {?>
      <div class="slideshow-container" >

  <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
    <div style="text-align:center"><a class="prev" onclick="plusSlides(-1)">&#10094;</a><a href="index.php?mod=product&ac=catalog&id=<?php echo $sach1["masach"];?>" ><?php echo $sach1['tensach'];?></a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a></div>
    <div><a href="#"><img src="images/sach/<?php echo $sach1['hinh'];?>" alt="" class="center"/></a></div>
  </div>



  <!-- Next and previous buttons -->
  
  </div>
  <?php } ?>
  <br>

  <!-- The dots/circles -->
  <div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  </div>
      </div>
      <!-- end blogroll -->
    
    <!-- END left -->
    <!-- BEGIN right -->
    
    <!-- END right -->
  </div>
  <!-- END sidebar -->
  <div class="break"></div>
  <!-- BEGIN footer -->
  <div id="footer">
    <p class="l">Copyright &copy; 2021 - <a href="#">Jayden News</a> &middot; All Rights Reserved</p>
    <p class="r">Template by: <a href="http://www.wpthemedesigner.com/">WordPress Designer</a> | Get More <a href="index.php">Free CSS Templates</a></p>
  </div>
  <!-- END footer -->
</div>
<!-- END wrapper -->
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</body>
</html>
