<style type="text/css">
	label { width: 23% !important; }
</style>
<section class="title">
	<h4>Settings of the Cartridge module</h4>
</section>

<section class="item">
<?php echo form_open('admin/cartridge/contractor/save');?>
<table style="width: 450px; border: 1px solid #eee;">
	<tr>
		<td>Name of contractor:</td>
		<td><?= form_input('name', (isset($contractor[0]->name)) ? $contractor[0]->name : "");?></td>
	</tr>
	<tr>
		<td>Phone of contractor:</td>
		<td><?= form_input('phone', (isset($contractor[0]->phone)) ? $contractor[0]->phone : "");?></td>
	</tr>
	<tr>
		<td>Email address of contractor</td>
		<td><?= form_input('mail', (isset($contractor[0]->mail)) ? $contractor[0]->mail : "");?></td>
	</tr>
    	<tr>
		<td>Contractor's office</td>
		<td><?= form_input('address', (isset($contractor[0]->address)) ? $contractor[0]->address : "");?></td>
	</tr>
    	<tr>
		<td>That's contactor is active?</td>
		<td><?= form_checkbox('active', (isset($contractor[0]->active) ? NULL : 1 ), (isset($contractor[0]->active) ? TRUE : FALSE));?></td>
		
	</tr>
    	<tr>
		<td>Comment:</td>
		<td><?= form_textarea('comment', (isset($contractor[0]->comment)) ? $contractor[0]->comment : "") ;?></td>
	</tr>
	<tr>
		<td colspan="2">
			<button class="btn blue" value="save" name="btnAction" type="submit"><span>Save</span></button>
				&nbsp;&nbsp;
			<a class="btn-more" href="/admin/cartridge/contractor/">Cancel</a>
		</td>
	</tr>
</table>
</section>

<?php 
 if(isset($contractor[0]->id)){
?>
<input type="hidden" name="id" value="<?= $contractor[0]->id; ?>">
<?php } ?>

<?= form_close(); ?>