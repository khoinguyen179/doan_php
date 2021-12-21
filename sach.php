
<script>
function chonMua(masach)
{
    
    //location.href="index.php?mod=cart&ac=add&ms="+masach;
    $.ajax({
        url:"http://localhost/ltweb/xlcart_ajax.php",
        type:"GET",
        data:{ms:masach},
        success:function (result) {
            $("#cartinfo").html(result);
        }
    })
    
}
</script>
<h1>TIN MỚI</h1>
<?php
$sachDB=new Sach();
if(isset($_GET['loai']))
{ 
    //$tam=$db->exeQuery("select count(*) from sach where maloai=?",array($_GET['loai']),PDO::FETCH_NUM);
    $tongSach=$sachDB->tongSoSach1Loai($_GET['loai']);
}else
{
    //$tam=$db->exeQuery("select count(*) from sach",array(),PDO::FETCH_NUM);
    $tongSach=$sachDB->tongSoSach();
}
//$tongSach=$tam[0][0];
$page=isset($_GET['p'])?$_GET['p']:1;
$bd=($page-1)*SACH_1_TRANG;
if(isset($_GET['loai']))
{ 
    $sachs=$db->exeQuery("select masach,tensach,mota, luotxem,hinh,ngaydang from sach where maloai=? limit $bd,".SACH_1_TRANG,array($_GET['loai']));
}else
{
    $sachs=$db->exeQuery("select masach,tensach,mota, luotxem,hinh,ngaydang from sach ORDER BY ngaydang DESC limit $bd,".SACH_1_TRANG);
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
<div style="clear:both"></div>
<div class="phantrang" style="text-align:center">
    <?php
    $sotrang=ceil($tongSach/SACH_1_TRANG);
    if($sotrang>1)
    for($i=1;$i<=$sotrang;$i++)
        if($i==$page)
            echo " ",$i," ";
        else    
        if(isset($_GET['loai']))
        echo '<a href="index.php?loai='.$_GET['loai'].'&p='.$i.'"> ',$i,' </a>';
        else
            echo '<a href="index.php?p='.$i.'"> ',$i,' </a>';
    ?>
</div>