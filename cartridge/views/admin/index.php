<style type="text/css">
	label { width: 23% !important; }
</style>
<section class="title">
	<h4>Settings of the Cartridge module</h4>
</section>
<section class="item">
<? if (empty($contractors)) { ?>
	<div class="no_data">First you need to create a contractor</div>
<? } else { ?>
<?php echo form_open('admin/cartridge?action=save');?>
<table style="width: 450px; border: 1px solid #eee;">
	<tr>
		<td>Select a contractor:</td>
		<td>
			<? $data = array('' => 'Select one'); foreach ($contractors as $row) { $data[$row->id] = $row->name; } ?>
			<?= form_dropdown('contractor', $data, isset($settings[0]->contractor) ? $settings[0]->contractor : ''); ?>

		</td>
	</tr>
	<tr>
		<td>Send an email to a contractor, when user create a order:</td>
		<td><?= form_checkbox('email', isset($settings[0]->email) ? NULL : 1, isset($settings[0]->email) ? TRUE : FALSE);?></td>
	</tr>
	<tr>
		<td>Send a sms to a contractor, when user create a order:</td>
		<td><?= form_checkbox('smpp', isset($settings[0]->smpp) ? NULL : 1, isset($settings[0]->smpp) ? TRUE : FALSE);?></td>
	</tr>
	<tr>
		<td>Please set the template for order:</td>
		<td>
			<?= form_textarea('template', isset($settings[0]->template) ? $settings[0]->template : '');?><br/>
			available tags:<br/>
			{manager_name} - company name<br/>
			{user} - sender (the user sent the request)<br/>
			{cart_count} - number of cartridges<br/>
			{cart_name} - the name of ordered cartridges<br/>
			{code} - the login of the user (sender)<br/>
			{address} - the address of the user (sender)<br/>
			{comment_form} - the comment of the user (sender)<br/>
		</td>
	</tr>
	<tr>
		<td>How many items can to order a user in a month</td>
		<td><?= form_input('items_order', isset($settings[0]->items_order) ? $settings[0]->items_order : '');?></td>
	</tr>
	<tr>
		<td colspan="2">
			<button class="btn blue" value="save" name="btnAction" type="submit"><span>Save</span></button>
				&nbsp;&nbsp;
			<a class="btn-more" href="admin/cartridge">Cancel</a>
		</td>
	</tr>
</table>
<? } ?>
</section>

<?php 
 if(isset($settings[0]->id)){
?>
<input type="hidden" name="id" value="<?php echo $settings[0]->id; ?>">
<?php } ?>

<?php echo form_close(); ?>