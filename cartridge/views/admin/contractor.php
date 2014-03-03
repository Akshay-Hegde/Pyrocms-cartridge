<section class="title">
	<h4>Contractors in the system</h4>
</section>
<section class="item">
<? if (!empty($contractors)) { ?>
<div id="filter-stage">
			<table border="0" class="table-list">
				<thead>
					<tr>
						<th>Name</th>
						<th>Phone</th>
						<th>Mail</th>
						<th>Address</th>
						<th>Active</th>
						<th width="200">Comment</th>
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
					<?php foreach ($contractors as $contractor): ?>
						<tr>
							<td class="collapse"><?= $contractor->name; ?></td>
							<td><?= $contractor->phone; ?></td>
							<td class="collapse"><?= $contractor->mail; ?></td>
							<td class="collapse"><?= $contractor->address; ?></td>
							<td class="collapse"><?= isset($contractor->active) ? "Enabled" : "Disabled"; ?></td>
                                                        <td class="collapse"><?= $contractor->comment; ?></td>
							<td class="actions">
								<?php echo anchor('admin/cartridge/contractor/edit/' . $contractor->id, lang('global:edit'), array('class'=>'button edit')); ?>
                                                                <?php echo anchor('admin/cartridge/contractor/delete/' . $contractor->id, lang('global:delete'), array('class'=>'button delete')); ?>
							</td>
							</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
</div>
<? } else { ?>
    <div class="no_data">No contractors yet</div>
<? } ?>

</section>