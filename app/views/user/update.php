<?php defined('BASEPATH') || exit('Direct access is not allowed'); ?>

<?php include "app/views/partial/header.html.php"; ?>

<?php include "app/views/partial/navigation.html.php"; ?>

<section class="container" style="width: 60%;">
  
<div class="container-title dark">Modificar usuario</div>
  
  <div class="container-content">

    <?php include "app/views/partial/form.html.php"; ?>

  </div>

  <div class="container-footer dark">
    <button onclick="window.location.href = '/user';" class="button danger text-center" type="button"><i class="fas fa-times"></i></button>
    <button class="button success" type="submit"><i class="fas fa-check"></i></button>
  </div>

</section>

<?php include "app/views/partial/footer.html.php"; ?>
