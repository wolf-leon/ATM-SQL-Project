<?php 
 if ($errors > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p style="font-weight:bold ;font-size:medium"><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>
