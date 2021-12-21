<div class="boxleft">
<div class="headerBoxLeft">
Nhà xuất bản
</div>
<?php
$nhaxb = array();
$r = array("manxb"=>"gd", "tennxb"=>"Giáo Dục");
$nhaxb[] = $r;
$r = array("manxb"=>"hcm", "tennxb"=>"TP. Hồ Chí Minh");
$nhaxb[] = $r;
$r = array("manxb"=>"tn", "tennxb"=>"Thanh Niên");
$nhaxb[] = $r;
$r = array("manxb"=>"dhqg", "tennxb"=>"Đại Học Quốc Gia");
$nhaxb[] = $r;
$r = array("manxb"=>"vhxh", "tennxb"=>"Văn Hóa xã hội");
$nhaxb[] = $r;

foreach($nhaxb as $row)
{
		?>
        <div >
        	<a href="index.php?mod=product&ac=press&idpress=<?php echo $row["manxb"];?>"><?php echo $row["tennxb"];?></a>
        </div>
        <?php
}
?>
</div>