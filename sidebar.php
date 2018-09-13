<div class="col-md-3" style=" float:right;">
	<div class="column-right sidebar-container">
		<div id="sidebar">
			<div class="widget" >
				<h2><i class="fa fa-group"></i>Kategoriler</h2>
				<div class="menu-film-izle-container">
					<ul id="menu-film-izle" class="menu">

						<?php
						include 'admin/context/baglan.php';

						$sorgu=$db->prepare("select * from kategori");
						$sorgu->execute();




						while($vericek=$sorgu->fetch(PDO::FETCH_ASSOC)) {
							
							if($_GET['k'] ==$vericek['kategori_id'] ){
								?>

								<li style="border-top:1px solid black; background:#000; text-align: center; " id="menu-item-20190"  class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-20190">
									<a style="color:rgba(255,22,24,.5);text-decoration:none" href="index.php?k=<?php echo $vericek['kategori_id'] ?>"><?php echo $vericek['kategori_ad'] ?></a>
								</li>
								<?php } else { ?>

									<li style="border-top:1px solid black; text-align: center;
									background: #121314; " id="menu-item-20190"  class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-20190">
										<a style="text-decoration: none;" href="index.php?k=<?php echo $vericek['kategori_id'] ?>"><?php echo $vericek['kategori_ad'] ?></a>
									</li>
								

							 
									<?php } } ?>

								</ul>

							</div>
						</div>
					</div>
				</div>

<div class="col-md-12"  style=" float:right;">
	<div class="column-right sidebar-container">
		<div id="sidebar">
			<div class="widget" >
				<h2><i class="fa fa-group"></i>Film Türleri</h2>
				<div class="menu-film-izle-container">
					<ul id="menu-film-izle" class="menu">

						

								<li style="border-top:1px solid black; background:#000; text-align: center; " id="menu-item-20190"  class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-20190">
									<a style="color:rgba(255,22,24,.5);text-decoration:none" href="index.php?t=d">Türkçe Dublaj</a>
								</li>
								

									<li style="border-top:1px solid black; text-align: center;
									background: #121314; " id="menu-item-20190"  class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-20190">
										<a style="text-decoration: none;" href="index.php?t=a">Türkçe Altyazılı</a>
									</li>

									<li style="border-top:1px solid black; text-align: center;
									background: #121314; " id="menu-item-20190"  class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-20190">
										<a style="text-decoration: none;" href="index.php?t=y">Yerli</a>
									</li>

							 
									

								</ul>

							</div>
						</div>
					</div>
				</div>


			</div>
			</div>



