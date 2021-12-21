<?php
if (!defined("ROOT"))
{
	echo "You don't have permission to access this page!"; exit;	
}

$loai = getIndex("id");
?>
<div class="productList">
<?php $sachDB=new Sach();
$cmts=new Comments();
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
    $sachs=$db->exeQuery("select masach,tensach,mota, luotxem,hinh,ngaydang from sach where masach= '$loai' ");
}
foreach($sachs as $sach)
{
?>	
    <div class="single">
      <h2><a href="index.php?mod=product&ac=catalog&id=<?php echo $sach["masach"];?>" ><?php echo $sach['tensach'];?></a></h2>
      <p><?php echo $sach['ngaydang'];?></p>
      <p><img class="alignright" src="images/sach/<?php echo $sach['hinh'];?>" width="200" height="150" alt="" /></p>
      <p><a href="#"><?php echo substr($sach['mota'],0,240);?></p>
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur quam augue, vehicula quis, tincidunt vel, varius vitae, nulla. Sed convallis orci. Duis libero orci, pretium a, <a href="#">convallis quis</a>, pellentesque a, dolor. Curabitur vitae nisi non dolor vestibulum consequat.</p>
      <p>Aliquatpretium antesque accumst euismod nunc vitae cras interdum sed donec ipsum. Integetnunc cumst vel gravida sit accumst lobortor congue accumst estas et. Laciliswisi cursus sed sociis curabitur intesque orci phasellus purus estibulum sagittis. Nuncut congue consequat ligula consecteturpis et ipsum sed id id augue. Curabitaesit orci laoreet libero vestas sit faucibus iacus curabitudin vestas tellus.</p>
      <blockquote>
        <p>Proin vestibulum. Ut ligula. Nullam sed dolor id odio volutpat pulvinar. Integer a leo. In et eros at neque pretium sagittis. Sed sodales lorem a ipsum suscipit gravida. Ut fringilla placerat arcu. Phasellus imperdiet. Mauris ac justo et turpis pharetra vulputate.</p>
      </blockquote>
      <p><cite><a href="#">Quote Source</a></cite></p>
      <p>Inquisquet urna proin vel volutpat velit tellus vivamus nas nam ac. Atauctortor ligula nulla volutpat laorem a sed curabitur et congue enim. Faciniacurabitudin estibulum montesque consequam sent phasellentesque feugiat tristibulum et curabitur aliquat. Vestpartur ligula urna eu curabitae egestassa nibh elit.</p>
      <h3>An Ordered List</h3>
      <ol>
        <li>Vestibulum in mauris semper tortor interdum ultrices.</li>
        <li>Sed vel lorem et justo laoreet bibendum. Donec dictum.</li>
        <li>Etiam massa libero, lacinia at, commodo in, tincidunt a, purus.</li>
        <li>Praesent volutpat eros quis enim blandit tincidunt.</li>
        <li>Aenean eu libero nec lectus ultricies laoreet. Donec rutrum, nisi vel egestas ultrices, ipsum urna sagittis libero, vitae vestibulum dui dolor vel velit.</li>
      </ol>
      <p>Inquisquet urna proin vel volutpat velit tellus vivamus nas nam ac. Atauctortor ligula nulla volutpat laorem a sed curabitur et congue enim. Faciniacurabitudin estibulum montesque consequam sent phasellentesque feugiat tristibulum et curabitur aliquat. Vestpartur ligula urna eu curabitae egestassa nibh elit.</p>
      <h3>An Unordered List</h3>
      <ul>
        <li>Vestibulum in mauris semper tortor interdum ultrices.</li>
        <li>Sed vel lorem et justo laoreet bibendum. Donec dictum.</li>
        <li>Etiam massa libero, lacinia at, commodo in, tincidunt a, purus.</li>
        <li>Praesent volutpat eros quis enim blandit tincidunt.</li>
        <li>Aenean eu libero nec lectus ultricies laoreet. Donec rutrum, nisi vel egestas ultrices, ipsum urna sagittis libero, vitae vestibulum dui dolor vel velit.</li>
      </ul>
	</div>


	  <?php } ?>
	  <div id="comments">
	  <h2>Bình luận:</h2>
      <div id="respond">
        <form action="#" method="post" id="commentform">
                    <input type="text" id="hoten" name="hoten"  class="form-control" placeholder="Tên của bạn" >
                    <br>                
                    <input type="email" name="email" size="40" class="form-control" placeholder="Email">
                    <br>                
                    <input type="text" name="tieude" size="40" class="form-control" placeholder="Tiêu đề">
                    <br>                             
                    <textarea name="comment" cols="40" rows="5" class="form-control" placeholder="Thông điệp"></textarea>        
                    <br>
                    <input type="submit" name="submit" value="submit" class="btn btn-primary">
		
        </form>
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
			if (isset($_POST["submit"]))
			{
				$sql="insert into coments(post, name, email, comment) values(:$loai, :hoten, :email, :comment) ";
				$arr = array($sach['masach']=>$loai,":hoten"=>$_POST["hoten"],":email"=>$_POST["email"],":comment"=>$_POST["comment"]);
				$stm= $pdh->prepare($sql);
				$stm->execute($arr);
				$n = $stm->rowCount();
				if ($n>0) echo "Đã thêm bình luận ";
				else echo "Lỗi thêm ";
			}

			$cmts = $db->exeQuery("select * from coments where post like '$loai'");	
foreach($cmts as $cmt)
{
	?>
	<div>
            
            <p>
				<img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
              	<h3 class="mt-0"><?php echo $cmt['name'];?></h3>
                <h3 ><b>at</b> <?php echo $cmt['postingdate'];?></h3>
            	<h2><?php echo htmlentities($cmt['comment']);?></h2>
           	
			</p>        
          </div>

<?php } ?>	

</div>