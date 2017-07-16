<?php if(count($errorsReg)>0): ?>
	<div class="errors">
		<?php foreach ($errorsReg as $error): ?>
			<p><?php echo $error;?></p>
		<?php endforeach?>
	</div>
<?php endif?>