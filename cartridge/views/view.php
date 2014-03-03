<h2 id="page_title" class="page-title">Close a request</h2>
<div>
	<?php if(validation_errors()):?>
	<div class="error-box">
		<?php echo validation_errors();?>
	</div>
	<?php endif;?>
        
        <?= form_open('cartridge/view/'.$id.'/?action=close', array('class'=>'simple'));?>
	<p>
		<label for="cartridge_id">Mow many cartridges you received:</label><br/>
		<? $data = array('' => 'Select one'); for ($i = 1; $i <= $cartridges[0]->count_request; $i++) { $data[$i] = $i; } ?>
		<?= form_dropdown('count_recived', $data, ''); ?>
        </p>
        <?= form_submit('', 'Close order'); ?>
        <?= form_close(); ?>
</div>