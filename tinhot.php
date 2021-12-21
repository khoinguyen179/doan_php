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
<h1>TIN HOT</h1>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
    $sachs=$db->exeQuery("select masach,tensach,mota, luotxem,hinh,luotxem from sach ORDER BY luotxem DESC limit 8");
}
foreach($sachs as $sach)
{
?>

    <div class="post">
        <h2><a href="index.php?mod=product&ac=catalog&id=<?php echo $sach["masach"];?>"><?php echo $sach['tensach'];?></a></h2>
        <a href="#"><img src="images/sach/<?php echo $sach['hinh'];?>" alt="" /></a>
        <h3><a href="#"><?php echo substr($sach['mota'],0,50);?></a></h3>
        <a><?php echo $sach['luotxem'];?> lượt xem <i class='fas fa-fire' style='font-size:12px ;color:red'></i> </a>
        <a href="index.php?mod=product&ac=catalog&id=<?php echo $sach["masach"];?>" class="readmore">Read More</a></div>    
 <?php } ?>
<!--Hien thi so trang -->
