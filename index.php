<?php include 'header.php'; 

if(isset($_POST['arama'])){

  $aranan =$_POST['aranan'];
  $sorgu=$db->prepare("select * from film where film_ad LIKE '%$aranan%'");

  $sorgu->execute();
  $say=$sorgu->rowCount();
}

$sorguu=$db->prepare("select * from kategori where kategori_id=:t ");
$sorguu->execute(array('t' => $_GET['k'] ));
$verit=$sorguu->fetch(PDO::FETCH_ASSOC);

if($_GET['k']){

	
	
	$baslik=$verit['kategori_ad']." Filmleri";
}else
{
	
	$baslik="Filmler";
}


?>


<!-- Main -->
<div id="main">
  <div class="row">
   <?php include 'slider.php'; ?>
 </div>

 <!-- Content -->
 <div id="content">




  <!-- Box -->
  <div style="width: 970px;" class="box">



   <?php include 'sidebar.php'; ?>
   <div class="col-md-9" style=" padding: 0px;">
    <div class="column-right sidebar-container">
     <div id="sidebar">
      <div class="widget " >
       <h2><i class="fa fa-group"></i><?php echo $baslik; ?>
       <span style="float: right; color:grey;"><?php if(isset($_POST['arama'])){echo $say." kayıt bulundu";}  ?></span></h2>
       <div class="menu-film-izle-container">
        <div style="  min-height: 1325px;">




         <div style=" margin-left: 0px; "class="row col-md-12">

          <?php 

             //sayfalama işlemi başlangıç---------------------------

             $sayfada=20; //sayfada gösterilecek içerik miktarı belirlenmesi
             $sorgu =$db->prepare("select * from film");
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



             if($_GET['k']){

              $sorgu=$db->prepare("select * from film where film_kategori=:t and film_durum=1 limit $limit,$sayfada");
              $sorgu->execute(array(
                't' => $_GET['k']
              ));


            }else
            {
             if(isset($_POST['arama'])){

              $aranan =$_POST['aranan'];
              $sorgu=$db->prepare("select * from film where film_ad LIKE '%$aranan%' limit $limit,$sayfada");

              $sorgu->execute();
             
            }
            else{
              $sorgu=$db->prepare("select * from film where film_durum=1 limit $limit,$sayfada");
              $sorgu->execute();
            }



          }





          while($vericek=$sorgu->fetch(PDO::FETCH_ASSOC)) {
            ?>

            <!-- Movie -->
            <a href="film-detay.php?h=<?php echo $vericek['film_id']  ?>">
              <div style="margin: 11px; word-wrap: break-word;"  class="movie">
                <div style= " width: 153px; " class="container1">
                  <img height="214" width="150" src="<?php echo $vericek['film_resim']  ?>" class="image">
                  <div  class="middle">

                    <div style="width: 153px;" class="text">
                      <span  style="word-break: break-all; "><?php echo $vericek['film_ad']  ?></span></div>
                    </div>
                    <div class="ge"><img width="90" height="90" src="css/images/play1.png"></div>

                    <div style="color:red; font-size: 18px;" class="te"><b>İZLE</b></div>
                  </div>
                  <div >
                    <div style="float:left; width:153px; padding-top:8px;">
                     <p style="float:left; font-size:14px; color:#fff; font-weight:bold;" ><?php echo substr($vericek['film_ad'], 0,10); ?></p>

                     <span  style="padding-left:12px; float:right; color:#a9a9a9;"><b>IMDB:</b><?php echo $vericek['film_imdb']  ?></span>

                   </div>
                 </div>
               </div>
             </a>
             <!-- end Movie -->

             <?php } ?>




           </div>






         </div>



       </div>	



     </div>
   </div>
 </div>

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











<div class="cl">&nbsp;</div>
</div>
<!-- end Box -->



</div>
<!-- end Content -->




<div class="cl">&nbsp;</div>
</div>
<!-- end Main -->
<?php include 'footer.php'; ?>