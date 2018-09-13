<?php 

ob_start();
session_start();
include 'baglan.php';



if (isset($_POST['filmekle'])) {
	
if ($_FILES['film_resim']["size"] >0) {
	//resimi ekleme kodu
	$uploads_dir='../../img/film';
	@$tmp_name =$_FILES['film_resim']["tmp_name"];
	@$name = $_FILES['film_resim']["name"];
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir,6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
}else{
	$refimgyol="img/film/varsayi.jpg";
}

	
	

	$zaman =$_POST['film_tarih']." ".$_POST['film_saat'];


	$kaydet=$db->prepare("INSERT INTO film SET
		film_ad=:ab,
		film_description=:sb,
		film_kategori=:db,
		film_imdb=:eb,
		film_tarih=:ere,
		film_resim =:herre,
		film_url=:t,
		film_yil=:y,
		film_durum=:u,
		film_dublaj=:h,
		film_slider=:p
		");

	

	

	if($_POST['film_slider']=="on"){
		$slider="1";
	}else{
		$slider="0";
	}
	

	$insert=$kaydet->execute(array(
		'ab' => $_POST['film_ad'],
		'sb' => $_POST['film_description'],
		'db' => $_POST['film_kategori'],
		'eb' => $_POST['film_imdb'],
		'ere' => $zaman,
		'herre'=> $refimgyol,
		't' => $_POST['film_url'],
		'y' => $_POST['film_yil'],
		'u' => $_POST['film_durum'],
		'h' => $_POST['film_dublaj'],
		'p' => $slider


	));

	


	if($insert){
		Header("Location:../production/film-ekle.php?durum=ok");

	}else{
		Header("Location:../production/film-ekle.php?durum=no");
	}
}




if(isset($_POST['filmduzenle'])){
	
	if ($_FILES['film_resim']["size"] >0) {

		$uploads_dir='../../img/film';
		@$tmp_name =$_FILES['film_resim']["tmp_name"];
		@$name = $_FILES['film_resim']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir,6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE film set
			film_ad=:a,
			film_description=:b,
			film_imdb=:c,
			film_kategori=:d,
			film_resim=:f,
			film_url=:t,
			film_yil=:y,
			film_durum=:u,
			film_dublaj=:h,
			film_slider=:p

			where film_id= {$_POST['film_id']}");

		

		if($_POST['film_slider']=="on"){
			$slider="1";
		}else{
			$slider="0";
		}
		$update=$duzenle->execute(array(
			'a' => $_POST['film_ad'],
			'b' => $_POST['film_description'],
			'c' => $_POST['film_imdb'],
			'd' => $_POST['film_kategori'],
			'f' => $refimgyol,
			't' => $_POST['film_url'],
			'y' => $_POST['film_yil'],
			'u' => $_POST['film_durum'],
			'h' => $_POST['film_dublaj'],
			'p' => $slider

		));
		
		if($update){
			
			//mevcut resmi siliyor arkadan hiddendan veriyi alıyor.
			$resimsil=$_POST['film_resimyolla'];
			unlink("../../$resimsil");

			Header("Location:../production/filmler.php?durum=ok");
		}else{
			Header("Location:../production/filmler.php?durum=no");
		}

	}else{
		$duzenle=$db->prepare("UPDATE film set
			film_ad=:a,
			film_description=:b,
			film_imdb=:c,
			film_kategori=:d,			
			film_url=:t,
			film_yil=:y,
			film_durum=:u,
			film_dublaj=:h,
			film_slider=:p

			where film_id= {$_POST['film_id']}");

		if($_POST['film_dublaj']=="on"){
			$dublaj="1";
		}else{
			$dublaj="0";
		}

		if($_POST['film_slider']=="on"){
			$slider="1";
		}else{
			$slider="0";
		}
		$update=$duzenle->execute(array(
			'a' => $_POST['film_ad'],
			'b' => $_POST['film_description'],
			'c' => $_POST['film_imdb'],
			'd' => $_POST['film_kategori'],			
			't' => $_POST['film_url'],
			'y' => $_POST['film_yil'],
			'u' => $_POST['film_durum'],
			'h' => $_POST['film_dublaj'],
			'p' => $slider

		));
		
		if($update){
			Header("Location:../production/filmler.php?durum=ok");
		}else{
			Header("Location:../production/filmler.php?durum=no");
		}
	}

	
}



if($_GET['filmsil'] =="ok"){

	$sil=$db->prepare("DELETE from film where film_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['film_id']
	));
	
	if($kontrol){
		Header("Location:../production/filmler.php?durum=ok");

	}else{
		Header("Location:../production/filmler.php?durum=no");
	}

}


if(isset($_POST['kategoriekle'])){


	$kaydet=$db->prepare("INSERT INTO kategori SET
		kategori_ad=:ab
		
		");

	$insert=$kaydet->execute(array(
		'ab' => $_POST['kategori_ad']
		


	));



	if($insert){
		Header("Location:../production/kategoriler.php?durum=ok");

	}else{
		Header("Location:../production/kategoriler.php?durum=no");
	}
}


if(isset($_POST['kategoriduzenle'])){

	

	$duzenle=$db->prepare("UPDATE kategori set
		kategori_ad=:a
		where kategori_id= {$_POST['kategori_id']}");

	$update=$duzenle->execute(array(
		'a' => $_POST['kategori_ad']


	));

	
	if($update){
		Header("Location:../production/kategoriler.php?durum=ok");
	}else{
		Header("Location:../production/kategoriler.php?durum=no");
	}
}

if($_GET['kategorisil'] =="ok"){

	$sil=$db->prepare("DELETE from kategori where kategori_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kategori_id']
	));
	
	if($kontrol){
		Header("Location:../production/kategoriler.php?durum=ok");

	}else{
		Header("Location:../production/kategoriler.php?durum=no");
	}
}


//genel ayar duzenle

if(isset($_POST['genelayarduzenle'])){
	
	if ($_FILES['ayar_logo']["size"] >0) {

		$uploads_dir='../../img';
		@$tmp_name =$_FILES['ayar_logo']["tmp_name"];
		@$name = $_FILES['ayar_logo']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir,6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE ayar set
			ayar_footer=:a,
			ayar_title=:b,
			ayar_description=:c,
			ayar_keywords=:d,
			ayar_logo=:f
			

			where ayar_id= 1");

		
		$update=$duzenle->execute(array(
			'a' => $_POST['ayar_footer'],
			'b' => $_POST['ayar_title'],
			'c' => $_POST['ayar_description'],
			'd' => $_POST['ayar_keywords'],
			'f' => $refimgyol
			

		));
		
		if($update){
			
			//mevcut resmi siliyor arkadan hiddendan veriyi alıyor.
			$resimsil=$_POST['film_resimyolla'];
			unlink("../../$resimsil");

			Header("Location:../production/genel-ayar.php?durum=ok");
		}else{
			Header("Location:../production/genel-ayar.php?durum=no");
		}

	}else{
		$duzenle=$db->prepare("UPDATE ayar set
			ayar_footer=:a,
			ayar_title=:b,
			ayar_description=:c,
			ayar_keywords=:d
			

			where ayar_id= 1");

	
		$update=$duzenle->execute(array(
			'a' => $_POST['ayar_footer'],
			'b' => $_POST['ayar_title'],
			'c' => $_POST['ayar_description'],
			'd' => $_POST['ayar_keywords']
			

		));
		
		if($update){
			Header("Location:../production/genel-ayar.php?durum=ok");
		}else{
			Header("Location:../production/genel-ayar.php?durum=no");
		}
	}
	
}


if(isset($_POST['iletisimayarduzenle'])){

	$duzenle=$db->prepare("UPDATE ayar set
			ayar_facebook=:a,
			ayar_twitter=:b,
			ayar_instagram=:c,
			ayar_mail=:d
			

			where ayar_id= 1");

	
		$update=$duzenle->execute(array(
			'a' => $_POST['ayar_facebook'],
			'b' => $_POST['ayar_twitter'],
			'c' => $_POST['ayar_instagram'],
			'd' => $_POST['ayar_mail']
			

		));
		
		if($update){
			Header("Location:../production/iletisim-ayar.php?durum=ok");
		}else{
			Header("Location:../production/iletisim-ayar.php?durum=no");
		}
}




?>