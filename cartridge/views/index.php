<h2 id="page_title" class="page-title"><?= lang('frontend:cartridge:index:title');?></h2>
<div>
	<?php if(validation_errors()):?>
	<div class="error-box">
		<?php echo validation_errors();?>
	</div>
	<?php endif;?>
        
        <?= form_open('cartridge?action=order', array('class'=>'simple'));?>
	<p>
		<label for="cartridge_id"><?= lang('frontend:cartridge:index:cart_need');?>:</label><br/>
		<? $data = array('' => lang('frontend:buttons:dropdown')); foreach ($cartridges as $row) { $data[$row->id] = $row->name; } ?>
		<?= form_dropdown('cartridge_id', $data, ''); ?>
	</p>

	<p>
				<label for="count_request"><?=lang('frontend:cartridge:index:cart_count');?> (<?=lang('frontend:cartridge:index:can_to_order');?> <?= $count_active; ?>)</label><br/>
			<? $data = array('' => lang('frontend:buttons:dropdown')); for ($i = 1; $i <= $count_active; $i++) { $data[$i] = $i; } ?>
			<?= form_dropdown('count_request', $data, ''); ?>
	</p>
	<p>
				<label for="comment"><?= lang('frontend:cartridge:index:comment');?></label>
				<?php echo form_textarea(array('name' => 'comment', 'cols' => 20, 'rows' => 5)); ?>
	</p>
        <?= form_submit('', lang('frontend:buttons:save')); ?>
        <?= form_close(); ?>
</div>