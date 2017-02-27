<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = "Welcome to Library";
?>
<style>

</style>
<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
        <h1>A Warm Welcome!</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <p><a class="btn btn-primary btn-large">Books Now</a>
        </p>
    </header>

    <hr>

    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Latest Book</h3>
        </div>
    </div>
    <!-- /.row -->

    <!-- Page Features -->
    <div class="row text-center">
        <div  class="col-lg-12">


        <?php foreach ($query as $buku): ?>

        <div class="col-md-3 col-sm-6">
            <div class="thumbnail">
            <a href="buku/view/<?= $buku->id_buku?>" class="btn btn-primary" border="0">
                <?php

                if($buku['photo']=="") {
                    $gbr="http://lorempixel.com/300/300/sports/$buku->id_buku";
                }
                else {
                    $gbr = "uploads/".$buku->photo;
                }

                 ?>


                    <img src="<?= $gbr; ?>" alt=""  width="300" height="300" >

                </a>
                <div class="caption">
                    <h3><?= $buku['nama'] ?></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <p>
                        <a href="buku/view/<?= $buku['id_buku'] ?>" class="btn btn-primary">Detail</a>
                        <?php echo Yii::$app->user->isGuest ? '' : ( Html::a('Pinjam', ['pinjaman/view/'.$buku->id_buku], ['class' => 'btn btn-success']));?>

                    </p>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>



    </div>



</div>
