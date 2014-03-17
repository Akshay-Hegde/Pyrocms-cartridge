<section class="title">
	<h4>Edit an address</h4>
</section>

<section class="item">
<?php echo form_open('admin/cartridge/address/save');?>
<table style="width: 450px; border: 1px solid #eee;">
	<tr>
		<td>Enter address of user:</td>
		<td><?= form_textarea('address', (isset($address[0]->address)) ? $address[0]->address : "");?></td>
	</tr>
	<tr>
		<td colspan="2">
			<button class="btn blue" value="save" name="btnAction" type="submit"><span>Save</span></button>
				&nbsp;&nbsp;
			<a class="btn-more" href="/admin/cartridge/address/">Cancel</a>
		</td>
	</tr>
</table>
<input type="hidden" name="user" value="<?= $active_id; ?>">

<?= form_close(); ?>
</section>