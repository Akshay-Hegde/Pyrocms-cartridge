<script>
	$(document).ready(function(){
		var cont = <?= $count_active; ?>;
		if (cont == 0) {
			$('#cid').prop('disabled', true);
			$('#count').prop('disabled', true);
			$('#comment').prop('disabled', true);
			$('#btnSave').prop('disabled', true);
			//alert('<?= lang("frontend:cartridge:messages:have_open_order");?>');
			$("#modal-content, #modal-background").toggleClass("active");
		}
	});
</script>
<div id="modal-background"></div>
<div id="modal-content">
    <!--<a style="text-decoration: underline; cursor: pointer" id="modal-close">Close</a>-->
    <p><?= lang("frontend:cartridge:messages:have_open_order");?></p>
</div>
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
		<?= form_dropdown('cartridge_id', $data, '', 'id="cid"'); ?>
	</p>

	<p>
		<label for="count_request"><?=lang('frontend:cartridge:index:cart_count');?> (<?=lang('frontend:cartridge:index:can_to_order');?> <?= $count_active; ?>)</label><br/>
		<? $data = array('' => lang('frontend:buttons:dropdown')); for ($i = 1; $i <= $count_active; $i++) { $data[$i] = $i; } ?>
		<?= form_dropdown('count_request', $data, '', 'id="count"'); ?>
	</p>
	<p>
		<label for="comment"><?= lang('frontend:cartridge:index:comment');?></label>
		<?php echo form_textarea(array('name' => 'comment', 'cols' => 20, 'rows' => 5, "id" => "comment")); ?>
	</p>
        <?= form_submit('', lang('frontend:buttons:save'), 'id="btnSave"'); ?>
        <?= form_close(); ?>
</div>