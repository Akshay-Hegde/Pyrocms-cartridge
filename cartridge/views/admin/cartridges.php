<section class="title">
	<h4>List of cartridges</h4>
</section>
<section class="item">
<? if (!empty($cartridges)) { ?>
<div id="filter-stage">
			<table border="0" class="table-list">
				<thead>
					<tr>
						<th>Name</th>
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
					<?php foreach ($cartridges as $cartridge): ?>
						<tr>
							<td class="collapse"><?= $cartridge->name; ?></td>
							<td class="actions">
								<?php echo anchor('admin/cartridge/cartridges/edit/' . $cartridge->id, lang('global:edit'), array('class'=>'button edit')); ?>
                                                                <?php echo anchor('admin/cartridge/cartridges/delete/' . $cartridge->id, lang('global:delete'), array('class'=>'button delete')); ?>
							</td>
							</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
</div>
<? } else { ?>
    <div class="no_data">No cartridges yet</div>
<? } ?>
