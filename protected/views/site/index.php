<?php
Yii::app()->clientscript
        ->registerCssFile(Yii::app()->theme->baseUrl . '/css/bootstrap.css')
        ->registerCssFile(Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css')
?>

<?php
$this->pageTitle = Yii::app()->name;
?>
<h3><?php echo Yii::app()->name; ?></h3>

<hr class="featurette-divider">
<br>

<div class="container marketing">
 
    <!-- Three columns of text below the carousel -->
    
    <!--<div class="row">
        
        <div class="col-lg-4">
            <!--<div class="thumbnails">-->
            <!--<img class="img-circle" src="images/img02.png" alt="Generic placeholder image"  style="width: 300px; height: 300px; alignment-adjust: central; ">
            <h2>Sembrando</h2>
            <p>Sembramos para la vida, sabemos la importancia de sembrar por ello lo llevamos a cabo siempre de la mejor manera estamos contentos con el trabajo que hacemos,
            pues contruibuimos a la mejora del ambiente</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        
        
        </div>
        <div class="col-lg-4">
            <!--<div class="thumbnails">-->
            <!--<img class="img-circle" src="images/img01.jpg" alt="Generic placeholder image"  style="width: 300px; height: 300px; alignment-adjust: central; ">
            <h2>Misión</h2>
            <p>Constribuir al desarrollo ambiental sostenible en nuestro País llevando a cada rincon esta manera de cuidar el planeta</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>      
        </div>
  
    </div>-->
    
    <div class="row">
        <img class="img-rounded" src="images/img2.jpg" alt="Generic placeholder image" style="width: 800px; height: 400px;">
        <br>
        <br>
        <div class="container">
        <h3>Sembrando</h3>
        <p class="text-success">...Podemos constribuir con la conservacion del ambiente sembrando, </p>
        <p class="text-success">cuando cada uno de nosotros sembramos tenemos la oportunidad de hacerlo...</p>
        <br>
        <br>
        <br>
        </div>

        <blockquote>
            <p><em>"El que antes de su muerte ha plantado un árbol, no ha vivido inútilmente."</em></p>
            <small><cite>Proverbio hindú</cite></small>
        </blockquote>
    
    </div>




</div>