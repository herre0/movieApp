<?php 

include 'header.php' ;

$sorgut=$db->prepare("select * from kategori ");
$sorgut->execute();
$say=$sorgut->rowCount();

?>


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
            <h2>Kategoriler

              <small><?php
              echo $say." kayıt listelendi ";
              ?></small>



            </h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <div class=" col-md-10 col-sm-10 col-xs-10">

              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings" >
                     <th class="column-title" >  ID </th>
                     <th class="column-title text-center">Kategori Ad </th>


                     <th class="column-title"> </th>


                   </tr>
                 </thead>

                 <?php 

             //sayfalama işlemi başlangıç---------------------------
                 $i=0;
             $sayfada=10; //sayfada gösterilecek içerik miktarı belirlenmesi
             $sorgu =$db->prepare("select * from kategori");
             $sorgu->execute();
             $toplam_icerik = $sorgu->rowCount();

             $toplam_sayfa =ceil($toplam_icerik / $sayfada);

            //eger sayfa girilmemişse 1 varsayalım
             $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] :1 ;

            //1 den küçükse bir sayfa sayısı girdildiyse 1 yapalım
             if($sayfa <1) {$sayfa=1;}

            //toplam sayfa sayımızdan fazla yazılırsa en son sayfayı verelim
             if($sayfa > $toplam_sayfa){$sayfa = $toplam_sayfa;}

             $limit =($sayfa -1)*$sayfada;

             $sorgu=$db->prepare("select * from kategori limit $limit,$sayfada");
             $sorgu->execute();


             while($vericek=$sorgu->fetch(PDO::FETCH_ASSOC)) {
               ?>
               <tbody>
                 <tr class="odd pointer">




                  <td class=" "><?php  echo $i=$i+1;  ?></td>
                  <form action="../context/islem.php" method="POST">
                    <td class="text-center ">

                      <input type="text" id="first-name" name="kategori_ad" required="required" class="form-control col-md-6 col-xs-6" value="<?php echo $vericek['kategori_ad'] ?>">
                      <input type="hidden" name="kategori_id" value="<?php echo $vericek['kategori_id'] ?>">

                    </td>

                    <td class="text-center " align="right">

                     <button type="submit" name="kategoriduzenle" class="btn btn-primary fa fa-pencil">&nbsp;&nbsp;Düzenle</button>

                   </form>
                   <a href="../context/islem.php?kategorisil=ok&kategori_id=<?php echo $vericek['kategori_id'] ?>"> <button class="btn btn-danger fa fa-trash">&nbsp;&nbsp;Sil</button></a>
                 </td>

               </td>
             </tr>

             <?php } ?>


             <form action="../context/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2"  data-parsley-validate class="form-horizontal form-label-left">



              <div class="form-group">

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <input placeholder="Kategori adını giriniz.." type="text" id="first-name" name="kategori_ad" required="required" class="form-control col-md-7 col-xs-12" value="">
                </div>
                <button type="submit" name="kategoriekle" class="btn btn-success">Ekle</button>
              </div>
              <?php if($_GET['durum'] =="ok"){echo "işlem başarılı";} elseif($_GET['durum'] =="no"){ echo "işlem başarısız";} ?>


            </div>




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