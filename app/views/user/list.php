<?php defined('BASEPATH') || exit('Direct access is not allowed'); ?>

<?php include "app/views/partial/header.html.php"; ?>

<?php include "app/views/partial/navigation.html.php"; ?>

<section class="container" style="width: 80%;">
  <div class="container-title dark">Usuarios</div>
  <div class="container-content">

    <div id="users-table" class="table-container" role="table" aria-label="users">
      
      <?php include "app/views/partial/table-head.html.php"; ?>

      <div id="flex-table-rows-container">

        <?php foreach ($users as $user) : ?>
          <div class="flex-table row" role="rowgroup">
            <div class="flex-row" role="cell">
              <div class="text-center"><?php echo $user['name']; ?></div>
            </div>
            <div class="flex-row" role="cell">
              <div class="text-center"><?php echo $user['surname']; ?></div>
            </div>
            <div class="flex-row" role="cell" style="justify-content: normal;">
              <div class="text-center" data-code="<?php echo $user['country_code']; ?>"><i class="fas fa-spinner fa-spin"></i></div>
            </div>
            <div class="flex-row" role="cell">
              <div class="text-center"><?php echo $user['dni']; ?></div>
            </div>
            <div class="flex-row" role="cell">
              <div class="text-center"><?php echo $user['email']; ?></div>
            </div>
            <div class="flex-row" role="cell">
              <a class="button warning" type="button" href="/user/update-form/<?php echo $user['id']; ?>"><i class="fas fa-edit"></i></a>
              <a
                class="button danger"
                type="button"
                href="<?php echo $user['email'] == $email ? '#' : '/user/delete/'.$user['id']; ?>"
                <?php echo $user['email'] == $email ? '#' : '/user/delete/'.$user['id']; ?>
                <?php if ($user['email'] == $email) : ?>onclick="return alert('No puede autoeliminarse')"<?php endif; ?>
                <?php if ($user['email'] != $email) : ?>onclick="return confirm('¿Seguro de eliminar al usuario?');"<?php endif; ?>
              >
                <i class="fas fa-trash-alt"></i>
              </a>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

    </div>

  </div>

  <div class="container-footer dark">
    <a href="/user/create-form" class="button primary text-center" type="button"><i class="fas fa-plus"></i></a>
  </div>

</section>

<?php include "app/views/partial/footer.html.php"; ?>
