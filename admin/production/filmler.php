<?php 

include 'header.php' ;
if(isset($_POST['arama'])){

  $aranan =$_POST['aranan'];
  $sorgu=$db->prepare("select * from film where film_ad LIKE '%$aranan%'");

  $sorgu->execute();
  $say=$sorgu->rowCount();
}else{
  $sorgut=$db->prepare("select * from film ");
  $sorgut->execute();
  $say=$sorgut->rowCount();
}

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


     <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <form action="" method="POST">
          <div class="input-group">
            <input type="text" class="form-control" name="aranan" placeholder="Anahtar kelime giriniz..">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" name="arama">ARA</button>
            </span>
          </div>
        </form>

      </div>
    </div>




  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Filmler


           <small><?php
           echo $say." kayıt listelendi ";
           ?></small>


         </h2>
         <ul class="nav navbar-right panel_toolbox">
          <a href="film-ekle.php"> <button  class="btn btn-success fa fa-plus">&nbsp;&nbsp;Yeni Ekle</button></a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <?php if($_GET['durum'] =="ok"){?>
            
            <span style="color: green;"><?php echo "işlem başarılı"; ?></span>

          <?php

        } elseif($_GET['durum'] =="no"){ ?>
          <span style="color: red;"><?php echo "işlem başarısız"; ?></span>
    <?php    } ?>
        

        <div class="table-responsive">
          <table class="table table-striped jambo_table bulk_action">
            <thead>
              <tr class="headings" >
               <th class="column-title" > Resim </th>
               <th class="column-title text-center">Film Ad </th>

               <th class="column-title text-center">Kategori </th>
               <th class="column-title text-center">Durum </th>
               <th class="column-title"> </th>


             </tr>
           </thead>

           <?php 

             //sayfalama işlemi başlangıç---------------------------

             $sayfada=25; //sayfada gösterilecek içerik miktarı belirlenmesi
             
             $toplam_icerik = $say;

             $toplam_sayfa =ceil($toplam_icerik / $sayfada);

            //eger sayfa girilmemişse 1 varsayalım
             $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] :1 ;

            //1 den küçükse bir sayfa sayısı girdildiyse 1 yapalım
             if($sayfa <1) {$sayfa=1;}

            //toplam sayfa sayımızdan fazla yazılırsa en son sayfayı verelim
             if($sayfa > $toplam_sayfa){$sayfa = $toplam_sayfa;}

             $limit =($sayfa -1)*$sayfada;

             if(!isset($_POST['arama'])){
              $sorgu=$db->prepare("select * from film limit $limit,$sayfada");
              $sorgu->execute();

            }





            while($vericek=$sorgu->fetch(PDO::FETCH_ASSOC)) {
             ?>
             <tr class="odd pointer">

              <td class=" "><img style="width: 96px; height: 42px;" src="../../<?php echo $vericek['film_resim'] ?>"></td>


              <td class="text-center "><?php echo $vericek['film_ad']  ?></td>
              <td class="text-center "><?php
              $katasor=$db->prepare("select * from kategori where kategori_id=:herre");
              $katasor->execute(array('herre' => $vericek['film_kategori'] ));
              $katcek=$katasor->fetch(PDO::FETCH_ASSOC);

              echo $katcek['kategori_ad']; 

              ?></td>



              <td class=" text-center"><?php 

              if ($vericek['film_durum'] == "1") {
               echo "AKTİF";
             }else{
              echo "PASİF";
            }

            ?></td>
            <td class="text-center " align="right">

              <a href="film-duzenle.php?film_id=<?php echo $vericek['film_id'] ?>"><button class="btn btn-primary fa fa-pencil">&nbsp;&nbsp;Düzenle</button></a>

              <a href="../context/islem.php?filmsil=ok&film_id=<?php echo $vericek['film_id'] ?>"> <button class="btn btn-danger fa fa-trash">&nbsp;&nbsp;Sil</button></a>
            </td>

          </td>
        </tr>
        <?php } ?>





      </tbody>
    </table>

    <!-- SAYFALAMA İŞLEMİ -->
    <ul class="pagination">

      <?php 

      $s=0;

      while($s <$toplam_sayfa){
        $s++; 


        if($s==$sayfa) {?>

          <li class="active">
            <a href="filmler.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>
          </li>

          <?php } else { ?>

            <li>
              <a href="filmler.php?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a>

            </li>

            <?php } 
          }?>

        </ul>         
        <!-- SAYFALAMA İŞLEMİ -->
      </div>

    </div>
  </div>
</div>
</div>
</div>
</div>
<!-- /page content -->


<?php include 'footer.php'; ?>