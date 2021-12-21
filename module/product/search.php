<?php
if (!defined("ROOT"))
{
	echo "You don't have permission to access this page!"; exit;	
}
?>
<div class="productList">
<?php
$sachDB=new Sach();
$tensach = getIndex("proname");	
if(isset($_GET['loai']))
{ 
    //$tam=$db->exeQuery("select count(*) from sach where maloai=?",array($_GET['loai']),PDO::FETCH_NUM);
    $tongSach=$sachDB->tongSoSach1Loai($_GET['loai']);
}else
{
    //$tam=$db->exeQuery("select count(*) from sach",array(),PDO::FETCH_NUM);
    $tongSach=$sachDB->tongSoSach();
}
?>

	<?php
$page=isset($_GET['p'])?$_GET['p']:1;
$bd=($page-1)*SACH_1_TRANG;
if(isset($_GET['loai']))
{ 
    $sachs=$db->exeQuery("select masach,tensach,mota, luotxem,hinh,ngaydang from sach where maloai=? limit $bd,".SACH_1_TRANG,array($_GET['loai']));
}else
{
    $sachs=$db->exeQuery("select masach,tensach,mota, luotxem,hinh,ngaydang from sach where tensach like '%$tensach%'" );
}
foreach($sachs as $sach)
{
?>

    <div class="post">
        <h2><a href="index.php?mod=product&ac=catalog&id=<?php echo $sach["masach"];?>" ><?php echo $sach['tensach'];?></a></h2>
        <a href="#"><img src="images/sach/<?php echo $sach['hinh'];?>" alt="" /></a>
        <h3><a href="#"><?php echo substr($sach['mota'],0,50);?></a></h3>
        <a><?php echo $sach['ngaydang'];?></a>
        <a href="index.php?mod=product&ac=catalog&id=<?php echo $sach["masach"];?>" class="readmore">Read More</a> </div>    
 <?php } ?>
<!--Hien thi so trang -->

</div>
