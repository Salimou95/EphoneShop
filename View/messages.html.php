<!-- Messages -->
<?php

use Service\Session;

$messages = Session::getMessages();
?>

<?php if ($messages) :  ?>

    <?php foreach ($messages as $type => $messagesType) : ?>

        <div class="alert alert-<?= $type ?>">

        <?php foreach ($messagesType as $msg) : ?>

            <div><?= $msg ?></div>

         <?php endforeach; ?>

        </div>

        <?php endforeach; ?>

<?php endif; ?>


<?php $type = "error" ?>
<div class="alert">

<div>
    <?php if($type == "success"){ ?>
        <i class="fa-regular fa-circle-check" style="color: #ffffff;"></i>
    <?php }else{ ?>
        <i class="fa-regular fa-circle-xmark" style="color: #ffffff;"></i><?php }?>
     <p>testtest</p> <p class="cross">X</p>

</div>



</div>

<div class="alert">

<div>
    <?php if($type == "success"){ ?>
        <i class="fa-regular fa-circle-check" style="color: #ffffff;"></i>
    <?php }else{ ?>
        <i class="fa-regular fa-circle-xmark" style="color: #ffffff;"></i><?php }?>
     <p>testtest</p> <p class="cross">X</p>

</div>



</div>

