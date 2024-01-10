<?php  if (count($errors) > 0) : ?>
  <div class="mt-10 text-danger text-center font-weight-bold">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>