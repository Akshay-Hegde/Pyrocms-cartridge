<h2 id="page_title" class="page-title"><?= lang('frontend:cartridge:orders:title');?></h2>
<p>&nbsp;</p>
<? if ($active_orders) { ?>
<p><b><?= lang('frontend:cartridge:orders:table:open_orders');?></b></p>
        <div style="float: left; width: 20%"><?= lang('frontend:cartridge:orders:table:id');?></div>
        <div style="float: left; width: 20%"><?= lang('frontend:cartridge:orders:table:name');?></div>
        <div style="float: left; width: 20%"><?= lang('frontend:cartridge:orders:table:requested');?></div>
        <div style="float: left; width: 20%"><?= lang('frontend:cartridge:orders:table:comment');?></div>
        <div style="float: left; width: 20%"><?= lang('frontend:cartridge:orders:table:request_date');?></div>
        <? foreach ($active_orders as $active_order) { ?>
        <div style="float: left; width: 20%" id='id'><?= $active_order->id; ?>&nbsp;</div>
        <div style="float: left; width: 20%" id='name'><a href="/cartridge/view/<?= $active_order->id; ?>">Посмотреть</a></div>
        <div style="float: left; width: 20%" id='count_request'><?= $active_order->count_request; ?></div>
        <div style="float: left; width: 20%" id='comment'><?= isset($active_order->comment) ? $active_order->comment.'&nbsp;' : '&nbsp;'; ?></div>
        <div style="float: left; width: 20%" id='date'><?= $active_order->date; ?></div>

        <? } ?>
<? } else { ?>
<p><?= lang('frontend:cartridge:messages:no_orders');?></p>
<? } ?>