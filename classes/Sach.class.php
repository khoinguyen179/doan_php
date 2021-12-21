<?php
class Sach extends Db{
	public function tatCa()
	{
		$sql="select * from sach";
		return $this->exeQuery($sql);	
	}
	public function sach1Loai($maloai)
	{
		$sql="select * from sach where maloai=?";
		return $this->exeQuery($sql,array($maloai));	
	}
	public function tongSoSach()
	{
		$sql="select count(*) from sach";
		$t=$this->exeQuery($sql,array(),PDO::FETCH_NUM);	
		return $t[0][0];
	}
	public function tongSoSach1Loai($maloai)
	{
		$sql="select count(*) from sach where maloai=?";
		$t=$this->exeQuery($sql,array($maloai),PDO::FETCH_NUM);	
		return $t[0][0];
	}
	public function thongTin1Sach($ma)
	{
		$sql="select * from sach where masach=?";
		return $this->exeQuery($sql,array($ma));	
	}	
	public function thongTinNhieuSach($arr_ma)
	{
		
		for($i=0;$i<count($arr_ma);$i++)
		$arr_ma[$i]="'".$arr_ma[$i]."'";
		$dsma=implode(",",$arr_ma);
		$sql="select * from sach where masach in (".$dsma.")";
		
		return $this->exeQuery($sql);	
	}
	public function giaSach($masach)
	{
		
		
		if(is_array($masach))
		{
			for($i=0;$i<count($masach);$i++)
		$masach[$i]="'".$masach[$i]."'";
		$dsma=implode(",",$masach);
		$sql="select masach,gia from sach where masach in (".$dsma.")";
		return $this->exeQuery($sql);
		}else
		{
			$sql="select masach,gia from sach where masach = ?";
		return $this->exeQuery($sql,array($masach));
		}
	}
	public function hot()
	{
		$sql="select tensach,luotxem  from sach ORDER BY luotxem DESC limit 5";
		return $this->exeQuery($sql);	
	}
	public function tenloai()
	{
		$sql="select tensach,luotxem, loai.tenloai as ten from sach inner join loai on sach.maloai = loai.maloai order by luotxem desc limit 5";
		return $this->exeQuery($sql);
	}
	public function search($search)
	{
		$sql="select tensach,luotxem  from sach where tensach='%$search%'";
		return $this->exeQuery($sql);	
	}
}
?>