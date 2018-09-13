<?php

include 'header.php';
date_default_timezone_set('Europe/Istanbul');
$slidersor=$db->prepare("select * from film where film_id=:id");
$slidersor->execute(array(
	'id' => $_GET['film_id']
));
$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);

?>

<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->
<?php include 'sidebar.php'; ?>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
	<a data-toggle="tooltip" data-placement="top" title="Settings">
		<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
	</a>
	<a data-toggle="tooltip" data-placement="top" title="FullScreen">
		<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
	</a>
	<a data-toggle="tooltip" data-placement="top" title="Lock">
		<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
	</a>
	<a data-toggle="tooltip" data-placement="top" title="Logout">
		<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
	</a>
</div>
<!-- /menu footer buttons -->
</div>
</div>

<!-- top navigation -->
<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<img src="images/img.jpg" alt="">John Doe
						<span class=" fa fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu pull-right">
						<li><a href="javascript:;"> Profile</a></li>
						<li>
							<a href="javascript:;">
								<span class="badge bg-red pull-right">50%</span>
								<span>Settings</span>
							</a>
						</li>
						<li><a href="javascript:;">Help</a></li>
						<li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
					</ul>
				</li>

				<li role="presentation" class="dropdown">
					<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-envelope-o"></i>
						<span class="badge bg-green">6</span>
					</a>
					<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
						<li>
							<a>
								<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where...
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where...
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where...
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where...
								</span>
							</a>
						</li>
						<li>
							<div class="text-center">
								<a>
									<strong>See All Alerts</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">


		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Film Duzenle </h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Settings 1</a>
									</li>
									<li><a href="#">Settings 2</a>
									</li>
								</ul>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">


						<form action="../context/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2"  data-parsley-validate class="form-horizontal form-label-left">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Resim <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<img width="192" height="75" src="../../<?php echo $slidercek['film_resim']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Film Resmi <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="file" id="first-name" name="film_resim" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Film Adı <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input placeholder="Film adını giriniz.." type="text" id="first-name" name="film_ad" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $slidercek['film_ad']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Film URL <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input value="<?php echo $slidercek['film_url']; ?>" placeholder="Film url giriniz.." type="text" id="first-name" name="film_url" required="required" class="form-control col-md-7 col-xs-12" value="">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Film Açıklaması <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">

									<textarea name="film_description" type="text" class="form-control col-md-7 col-xs-12"><?php echo $slidercek['film_description']; ?></textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Film IMDB <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input placeholder="" type="text" id="first-name" name="film_imdb" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $slidercek['film_imdb']; ?>">
								</div>
							</div>


							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategorisi <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="heard" class="form-control" name="film_kategori" required="required">
										

										<?php 
										$secilideilsorgu=$db->prepare("select * from film where film_id=:nerre");
										$secilideilsorgu->execute(array('nerre' =>  $_GET['film_id'] ));
										$katcekherre=$secilideilsorgu->fetch(PDO::FETCH_ASSOC);
										///////////////////////////////
										

										$secilisorgu=$db->prepare("select * from kategori where kategori_id=:herre");
										$secilisorgu->execute(array('herre' => $katcekherre['film_kategori'] ));
										$katcek=$secilisorgu->fetch(PDO::FETCH_ASSOC);


										?>


										<option value="<?php echo $katcek['kategori_id']; ?>"><?php echo $katcek['kategori_ad']; ?></option>


										<?php

										$sor=$db->prepare("select * from kategori where kategori_id !=:tu");
										$sor->execute(array('tu' =>  $katcek['kategori_id']  ));


										while($cek=$sor->fetch(PDO::FETCH_ASSOC)) {



											?>

											<option value="<?php echo $cek['kategori_id']; ?>"><?php echo $cek['kategori_ad']; ?></option>

											<?php }  ?>


										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Durum<span class="required">*</span>
									</label>
									<div class="col-md-3 col-sm-3 col-xs-12">
										<select id="heard" class="form-control" name="film_durum" required="required">
											<?php if($slidercek['film_durum'] =="1") { ?>
												<option value="1">AKTİF</option>
												<option value="0">PASİF</option>
												<?php } else { ?>
													<option value="0">PASİF</option>
													<option value="1">AKTİF</option>

													<?php } ?>
												</select>
											</div>


											<div class="col-md-3 col-sm-3 col-xs-12">
												<input placeholder="yapım yılı" value="<?php echo $slidercek['film_yil'] ?>"  type="text" id="first-name" name="film_yil"   class="form-control col-md-7 col-xs-12" >
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Türkçe Dublaj <span class="required">*</span>
											</label>
											<div class="col-md-3 col-sm-3 col-xs-3">
												
												<select id="heard" class="form-control" name="film_dublaj" required="required">

													<?php if($slidercek['film_dublaj'] =="1"){ ?>
														<option value="1">Türkçe Dublaj</option>
														<option value="0">Türkçe Altyazılı</option>
														<option value="2">Yerli</option>
														<?php } ?>

														<?php if($slidercek['film_dublaj'] =="0"){ ?>
															<option value="0">Türkçe Altyazılı</option>
															<option value="1">Türkçe Dublaj</option>
															<option value="2">Yerli</option>
															<?php } if($slidercek['film_dublaj'] =="2"){ ?>
																<option value="2">Yerli</option>
																<option value="1">Türkçe Dublaj</option>
																<option value="0">Türkçe Altyazılı</option>

																<?php } ?>

															</select>


														</div>

													</div>

													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider <span class="required">*</span>
														</label>
														<div class="col-md-1 col-sm-1 col-xs-1">
															<?php if($slidercek['film_slider'] =="1") { ?>
																<input style="width: 20px;"  type="checkbox" id="first-name" name="film_slider" class="form-control" checked="checked"> 
																<?php } else{?>
																	<input style="width: 20px;"   type="checkbox" id="first-name" name="film_slider" class="form-control"> 
																	<?php } ?>
																</div>
															</div>



															<input type="hidden" name="film_id" value="<?php echo $slidercek['film_id']; ?>">

															<input type="hidden" name="film_resimyolla" value="<?php echo $slidercek['film_resim']; ?>">



															<div class="form-group">
																<div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
																	<button type="submit" name="filmduzenle" class="btn btn-primary">Duzenle</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- /page content -->

									<?php include 'footer.php' ?>