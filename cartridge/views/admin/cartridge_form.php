<style type="text/css">
	label { width: 23% !important; }
</style>
<section class="title">
	<h4>Add a cartridge</h4>
</section>

<section class="item">
<?php echo form_open('admin/cartridge/cartridges/save');?>
<table style="width: 450px; border: 1px solid #eee;">
	<tr>
		<td>Name:</td>
		<td><?= form_input('name', (isset($cartridge[0]->name)) ? $cartridge[0]->name : "");?></td>
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
 if(isset($cartridge[0]->id)){
?>
<input type="hidden" name="id" value="<?= $cartridge[0]->id; ?>">
<?php } ?>

<?= form_close(); ?>