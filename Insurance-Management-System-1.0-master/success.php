<?php  if (count($success) > 0) : ?>
  <div class="mt-10 text-success text-center font-weight-bold">
  	<?php foreach ($success as $success) : ?>
  	  <p><?php echo $success ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>