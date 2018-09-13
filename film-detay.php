
<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

<?php 

if($_GET['h']){

	$slidersor=$db->prepare("select * from film where film_id=:id");
	$slidersor->execute(array(
		'id' => $_GET['h']
	));
	$cek=$slidersor->fetch(PDO::FETCH_ASSOC);


	$sor=$db->prepare("select * from kategori where kategori_id=:id");
	$sor->execute(array(
		'id' => $cek['film_kategori']
	));
	$katcek=$sor->fetch(PDO::FETCH_ASSOC);

}


?>
<div style="width:650px; height: auto;">
	<h1><?php echo $cek['film_ad']; ?> İzle </h1>
	<br>

	<!-- Video Başlangıç -->



	<IFRAME SRC="<?php echo $cek['film_url']; ?>" FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO WIDTH=650 HEIGHT=400 allowfullscreen></IFRAME>
	<!-- Video Bitiş  -->

	<br><br>


	<div class="column-right sidebar-container">
		<div id="sidebar">
			<div class="widget" >
				<h2><i class="fa fa-group"></i>Film Bilgisi 
					<span style="float: right; color:grey;">
						<?php 
						date_default_timezone_set('Europe/Istanbul');
						$tarih = substr($cek['film_tarih'], 0,10);
						$saat = substr($cek['film_tarih'], 10,18);
						$nowtarih=date("Y-m-d");
						$nowsaat=date("H:i:s");


						$ilktarih=strtotime($tarih);
						$sontarih=strtotime($nowtarih);
						$tarihfark=($sontarih -$ilktarih)/86400;
					

						$ilkzaman=strtotime($saat);
						$sonzaman=strtotime($nowsaat);
						$saatfark=($ilkzaman -$sonzaman)/3600;


						if($tarihfark ==0){
							echo floor($saatfark)." saat önce eklendi";
						}
						else{

							if($tarihfark<31){
								echo $tarihfark." gün önce eklendi";
							}
							elseif($tarihfark>31)
							{
								
									$tarihfark = floor($tarihfark/30);
									
									if($tarihfark > 12){
										$tarihfark= $tarihfark/12;
										echo floor($tarihfark)." yıl önce eklendi";
									}else{
										echo $tarihfark." ay önce eklendi";
									}
								
								
							}
							
							
						}


						


					/* Tarih çevirme
					$a= substr($tarih, 0 ,4 );
					$b=	substr($tarih, 5 ,7 );
					$c=	substr($b, 3 ,5 );
					$d=substr($b, 0,2);

					echo $c.".".$d.".".$a." ||  ";*/
					/* Saat çevirme
					$t=substr($saat, 0, 3);
					$y=substr($saat, 3, 4 );
					$u=substr($y, 1,2 );
					$o=substr($saat, 7 );

					
					//echo $t.".".$u.".".$o;*/

					?>

				</span></h2>

				<div class="menu-film-izle-container">
					<div style="height: auto;">

						<div style="padding-bottom: 15px;" class="row">
							
							<div class="col-md-3">
								
								<img width="155" height="214" src="<?php echo $cek['film_resim']; ?>">
							</div>




							<div style="word-wrap: break-word;" class="col-md-9">
								<h3><?php echo $cek['film_ad']; ?></h3>
								<p><b style="font-size:14px;">Açıklama:&nbsp;</b><?php echo $cek['film_description']; ?></p>
								<p><b style="font-size:14px;">Kategori:&nbsp;</b><?php echo $katcek['kategori_ad']; ?></p>
								<p><b style="font-size:14px;">IMDB:&nbsp;</b><?php echo $cek['film_imdb']; ?></p>
								<p><b style="font-size:14px;">Yapım Yılı:&nbsp;</b><?php echo $cek['film_yil']; ?></p>

								<p><b style="font-size:14px;">Tür:&nbsp;</b>
									<?php 

								if($cek['film_dublaj'] =="1"){
									echo "Türkçe Dublaj";
								}if($cek['film_dublaj'] =="0"){
									echo "Türkçe Altyazılı";
								}if($cek['film_dublaj'] =="2"){
									echo "Yerli";
								}
								?>


							</p>


						</div>

					</div>





				</div>	



			</div>
		</div>
	</div>
	

</div>
</div>



<?php include 'footer.php'; ?>



