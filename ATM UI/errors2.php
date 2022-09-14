<?php 
 if (count($errors) > 0) : ?>
<div class="error">
    <?php foreach ($errors as $error) : ?>
    <p style="font-weight:bold ;font-size:medium;margin-top:0px; margin-bottom:6px;"><?php echo $error ?></p>
    <?php endforeach ?>
</div>

<?php  endif ?>