<?php if (!empty($errors)) : ?>
    <div class="error-formulaire">
        <?php foreach ($errors as $err) : ?>
            <div class="text-danger"><?= $err ?> <i class="fa-regular fa-circle-xmark cross" style="color: #ffffff;"></i></div>
        <?php endforeach; ?>
    </div>
<?php endif;?>