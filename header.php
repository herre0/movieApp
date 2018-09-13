<?php

include 'admin/context/baglan.php'; 
$slidersor=$db->prepare("select * from ayar");
$slidersor->execute(array());
$cek=$slidersor->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>

	<meta name="description" content="<?php echo $cek['ayar_description']; ?>">
	<meta name="keywords" content="<?php echo $cek['ayar_keywords']; ?>">



	<title><?php echo $cek['ayar_title']; ?></title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css"  />
	<link rel="stylesheet" href="css/style.css" type="text/css"/>


	<!--[if IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" />
	<![endif]-->
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-func.js"></script>


	<!-- Kategori alanı için syle kodları-->
	<style>
	.sidebar-container{padding-left:0}.sidebar-container .widget{margin-top:55px;background:#121314}.sidebar-container .widget h2{font-size:14px;font-weight:600;color:#fff;background:#0c0c0c;height:50px;line-height:50px;margin:0;padding:0 15px;padding-left:65px;position:relative}.sidebar-container .widget h2 i{font-size:18px;position:absolute;left:0;top:0;width:50px;height:50px;line-height:50px;background:#000;color:#fff;text-align:center}.sidebar-container .widget .menu{list-style:none;margin:0;padding:0}.sidebar-container .widget .menu li{float:left;width:100%;border-bottom:1px solid #0c0c0c;border-right:1px solid transparent;font-size:13px}.sidebar-container .widget .menu li:nth-child(2n){border-right:0;border-left:1px solid #0c0c0c}.sidebar-container .widget .menu li a{display:block;color:rgba(255,255,255,.5);padding:10px 15px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.sidebar-container .widget .menu li a:hover{background:#000;color:rgba(255,22,24,.5);text-decoration:none}
	





</style>


</head>
<body>
	<!-- Shell -->
	<div id="shell">

		<div id="header">
			<h1 id="logo"><a style="background:url('<?php echo $cek['ayar_logo'] ?>') no-repeat 0 0;" href="index.php">Movie Hunter</a></h1>
			

			<div class="social">
				<?php 

				if(!($cek['ayar_facebook']=="" && $cek['ayar_twitter']=="" && $cek['ayar_facebook']=="")){
					?>

					<span>Bizi takip edin&nbsp;
						<?php if($cek['ayar_instagram'] !=""){ ?>
							<a href="<?php echo $cek['ayar_instagram'] ?>"><img width="16" height="16" src="css/images/insta.jpg"></a></span>
							<?php } ?>
							<ul>
								<?php if($cek['ayar_twitter'] !=""){ ?>
									<li><a class="twitter" href="<?php echo $cek['ayar_twitter'] ?>">twitter</a></li>
									<?php } ?>
									<?php if($cek['ayar_facebook'] !=""){ ?>
										<li style="padding-left:5px;"><a class="facebook" href="<?php echo $cek['ayar_facebook'] ?>">facebook</a></li>
										<?php } ?>
									</ul>

									<?php } ?>
								</div>

								<!-- Navigation -->
								<div id="navigation">
									<ul>

										<li><a href="#">Film İsteği</a></li>
										<li><a href="#">İletişim</a></li>


									</ul>
								</div>
								<!-- end Navigation -->

								<!-- Sub-menu -->
								<div id="sub-navigation">
									<ul>
										<li><a  href="#">Anasayfa</a></li>
										<li><a href="#">Tavsiye Filmler</a></li>
										<li><a href="#">IMDB +7 Filmler</a></li>
										<li><a href="#">Yeni Filmler</a></li>

									</ul>

									<div id="search">
										<form action="index.php" method="POST" accept-charset="utf-8">
											<label for="search-field"></label>          
											<input style="color:#fff;" placeholder="Anahtar kelime girin.." type="text" name="aranan"  id="search-field" class="blink search-field"  />
											<input  style="color:#fff; background-color: #1A1A1A;" type="submit" value="ARA" class="" name="arama" />
										</form>
									</div>

								</div>
								<!-- end Sub-Menu -->

							</div>
	<!-- end Header -->