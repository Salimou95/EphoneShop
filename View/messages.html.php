<!-- Messages -->
<?php

use Service\Session;

$messages = Session::getMessages();
?>

<?php if ($messages) :  ?>

    <?php foreach ($messages as $type => $messagesType) : ?>

        <div class="alert alert-<?= $type ?>">

        <?php foreach ($messagesType as $msg) : ?>

            <div>
                <p><?= $msg ?></p>
                <i class="fa-regular fa-circle-xmark cross" style="color: #ffffff;"></i>
            </div>

         <?php endforeach; ?>

        </div>

        <?php endforeach; ?>

<?php endif; ?>



