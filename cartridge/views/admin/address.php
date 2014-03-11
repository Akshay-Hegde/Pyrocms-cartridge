<section class="title">
	<h4><?= lang('page:admin_limit:limit:title');?></h4>
</section>
<section class="item">
<div>
	<form action="/admin/cartridge/address" method="get" accept-charset="utf-8">
		<input style="width: 80%" type="text" name="q" value="" placeholder="Enter a word"  />
		<button style="width: 18%" type="submit" class="btn blue"><span>Search</span></button>
	</form>
</div>
<? if (!empty($users)) { ?>
<div id="filter-stage">
			<table border="0" class="table-list">
				<thead>
					<tr>
						<th>Login</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Manage</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td colspan="8">
							<div class="inner"><?php $this->load->view('admin/partials/pagination'); ?></div>
						</td>
					</tr>
				</tfoot>
				<tbody>
					<?php foreach ($users as $user): ?>
						<tr>
							<td class="collapse"><?= $user->username; ?></td>
                                                        <td class="collapse"><?= user_displayname($user->id, $linked = FALSE); ?></td>
							<td class="collapse">
								<? foreach ($address as $addres) { ?>
								<? if ($addres->user == $user->id) { ?>
								<?= $addres->address; ?>
								<? } ?>
								<? } ?>
							</td>
							<td class="actions">
								<?php echo anchor('admin/cartridge/address/edit/' . $user->id, lang('global:edit'), array('class'=>'button edit')); ?>
                                                                <?php echo anchor('admin/cartridge/address/delete/' . $user->id, lang('global:delete'), array('class'=>'button delete')); ?>
							</td>
							</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
</div>
<? } else { ?>
    <div class="no_data"><?= lang('page:admin_users:users:messages:no_users');?></div>
<? } ?>

</section>