<?php

include "_debut.inc.php";
include "_controlesEtGestionErreurs.inc.php";

echo'
<div class="span8">
Bienvenue sur le site de la Maison Des Ligues de Lorraine .  

<p>Ce site a été effectué dans le cadre du premier PPE <p>
<p>Ce site offre les services suivants :</p>
<p>Gérer les établissements (caractéristiques et capacités d accueil) acceptant d héberger les differentes ligues.</p>
<li>consulter </li>
<li>réaliser </li>
<li>modifier les attributions des chambres aux groupes dans les établissements.</li>
</div>

<div class="span7">
                  <div id="myCarousel" class="carousel slide">
                  <!-- Carousel items -->
                  <div class="carousel-inner">
                  <div class="active item">
                     <img src="img/image1.jpg" alt="">
                     <div class="carousel-caption">
                     <h4>Le Tennis</h4>
                     <p>Raphael Nadal</p>
                     </div>
                  </div>
                  <div class="item">
                        <img src="img/image2.jpg" alt="">
                        <div class="carousel-caption">
                        <h4>La Natation</h4>
                        <p>Mickael Phelps</p>
                        </div>
                  </div>
                  <div class="item">
                        <img src="img/novak.jpg" alt="">
                        <div class="carousel-caption">
                        <h4>Le Tennis</h4>
                        <p>Novak Djokovic</p>
                        </div>
                  </div>
                  <div class="item">
                        <img src="img/bolt.jpg" alt="">
                        <div class="carousel-caption">
                        <h4>Le Sprint</h4>
                        <p>Usain Bolt</p>
                        </div>
                  </div>
                  <div class="item">
                        <img src="img/messi.jpg" alt="">
                        <div class="carousel-caption">
                        <h4>Le Football</h4>
                        <p>Lionel Messi</p>
                        </div>
                  </div>
                  <div class="item">
                        <img src="img/image2.jpg" alt="">
                        <div class="carousel-caption">
                        <h4>La Natation</h4>
                        <p>Mickael Phelps</p>
                        </div>
                  </div>

</div>

<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
</div>


</body>
</html>
';

footer();

?>
