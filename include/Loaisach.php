<div class="boxleft">
<div class="headerBoxLeft">
Loại sách
</div>
<?php
$loai = array();
$r = array("maloai"=>"th", "tenloai"=>"Tin Học");
$loai[] = $r;
$r = array("maloai"=>"to", "tenloai"=>"Toán Học");
$loai[] = $r;
$r = array("maloai"=>"td", "tenloai"=>"Từ Điển");
$loai[] = $r;

foreach($loai as $row)
{
		?>
        <div >
        	<a href="index.php?mod=product&ac=catalog&idcat=<?php echo $row["maloai"];?>">
			<?php echo $row["tenloai"];?></a>
        </div>
        <?php
}

?>
</div>

