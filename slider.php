

<head>





  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    jQuery(document).ready(function() {

      jQuery('.carousel[data-type="multi"] .item').each(function(){
        var next = jQuery(this).next();
        if (!next.length) {
          next = jQuery(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo(jQuery(this));

        for (var i=0;i<2;i++) {
          next=next.next();
          if (!next.length) {
            next = jQuery(this).siblings(':first');
          }
          next.children(':first-child').clone().appendTo($(this));
        }

      });

    });
  </script>
  <style>
  .carousel-control.left, .carousel-control.right {
    background-image:none;
  }

  .img-responsive{
    width:100%;
    height: 214px;
  }

  @media  {
    .carousel-inner .active.left {
      left: -25%;
    }
    .carousel-inner .next {
      left:  25%;
    }
    .carousel-inner .prev {
      left: -25%;
    }
  }

  @media (min-width: 768px) and (max-width: 991px ) {
    .carousel-inner .active.left {
      left: -33.3%;
    }
    .carousel-inner .next {
      left:  33.3%;
    }
    .carousel-inner .prev {
      left: -33.3%;
    }
    .active > div:first-child {
      display:block;
    }
    .active > div:first-child + div {
      display:block;
    }
    .active > div:last-child {
      display:none;
    }
  }

  @media (max-width: 767px) {
    .carousel-inner .active.left {
      left: -100%;
    }
    .carousel-inner .next {
      left:  100%;
    }
    .carousel-inner .prev {
      left: -100%;
    }
    .active > div {
      display:none;
    }
    .active > div:first-child {
      display:block;
    }
  }
</style>
<style>
.container1 {
    position: relative;
    
}

.image {
  opacity: 1;
  display: block;
 
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  bottom: 2%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}
.ge {
  
 transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.te {
  
 transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}
.container1:hover .image {
  opacity: 0.3;
}

.container1:hover .middle  {
  opacity: 1;
}
.container1:hover .ge {
  opacity: 1;
}
.container1:hover .te {
  opacity: 1;
}
.text {
  
  color: white;
  font-size: 16px;
  
}
</style>
</head>



<!--The main div for carousel-->
<div style="background:#121314; margin-top: 20px;"  class="container text-center">
  <div  class="carousel slide row" data-ride="carousel" data-type="multi" data-interval="3000" id="fruitscarousel">

    <div " class="carousel-inner">
      <?php

      $sorgu=$db->prepare("select * from film where film_slider=1 order by film_imdb DESC");
      $sorgu->execute();
      $vericek1= $sorgu->fetch(PDO::FETCH_ASSOC);



      ?>
      
      <div class="item active">
        <a href="film-detay.php?h=<?php echo $vericek1['film_id']; ?>">
        <div class="col-md-3">

         <div style= " width: 153px; margin: 20px;" class="container1">
          <img height="214" width="150" src="<?php echo $vericek1['film_resim']; ?>" class="image">
          <div  class="middle">

            <div style="width: 153px;" class="text">
              <span  style="word-break: break-all; "><?php echo $vericek1['film_ad']; ?></span></div>
          </div>
         <div class="ge"><img width="90" height="90" src="css/images/play1.png"></div>

          <div style="color:red; font-size: 18px;" class="te"><b>İZLE</b></div>
        </div>

      </div>
    </a>
    </div>

    <?php 
      $cekmeid =$vericek1['film_id'];
      $sorgu2=$db->prepare("select * from film where film_id !=$cekmeid and film_slider=1 order by film_tarih DESC,film_imdb DESC limit 16");
      $sorgu2->execute();

      while($vericek= $sorgu2->fetch(PDO::FETCH_ASSOC)){

     ?>
     
    <div  class="item">
      <a href="film-detay.php?h=<?php echo $vericek['film_id']; ?>">
      <div class="col-md-3">

      <div style=" width: 153px; margin: 20px;" class="container1">
  <img height="214" width="153" src="<?php echo $vericek['film_resim']; ?>" class="image">
  <div class="middle">
   
    <div class="text"><?php echo $vericek['film_ad']; ?></div>
  </div>
   <div class="ge"><img  width="90" height="90" src="css/images/play1.png"></div>

   <div style="color:red; font-size: 18px;" class="te"><b>İZLE</b></div>
</div>


     </div>
   </a>
   </div>

   <?php } ?>



 </div>

 <a style="margin-left: -52px;" class="left carousel-control" href="#fruitscarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
 <a  style="margin-right: -19px;" class="right carousel-control" href="#fruitscarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a> 

</div>
</div>




