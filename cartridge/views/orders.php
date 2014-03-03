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
        <? foreach ($cartridges as $cartridge) { ?>
        <? if ($active_order->cartridge_id == $cartridge->id and $active_order->status == 1) { ?>
        <div style="float: left; width: 20%" id='id'><?= $active_order->id; ?>&nbsp;</div>
        <div style="float: left; width: 20%" id='name'><a href="/cartridge/view/<?= $active_order->id; ?>"><?= $cartridge->name; ?></a></div>
        <div style="float: left; width: 20%" id='count_request'><?= $active_order->count_request; ?></div>
        <div style="float: left; width: 20%" id='comment'><?= isset($active_order->comment) ? $active_order->comment.'&nbsp;' : '&nbsp;'; ?></div>
        <div style="float: left; width: 20%" id='date'><?= $active_order->date; ?></div>
        <? } ?>
        <? } ?>
        <? } ?>
<? } else { ?>
<p><?= lang('frontend:cartridge:messages:no_orders');?></p>
<? } ?>
<p>&nbsp;</p>
<? if ($not_active_orders) { ?>
<p><b><?= lang('frontend:cartridge:orders:table:close_orders');?></b></p>
        <div style="float: left; width: 16.6%"><?= lang('frontend:cartridge:orders:table:id');?></div>
        <div style="float: left; width: 16.6%"><?= lang('frontend:cartridge:orders:table:name');?></div>
        <div style="float: left; width: 16.6%"><?= lang('frontend:cartridge:orders:table:requested');?></div>
        <div style="float: left; width: 16.6%"><?= lang('frontend:cartridge:orders:table:comment');?></div>
        <div style="float: left; width: 16.6%"><?= lang('frontend:cartridge:orders:table:recived');?></div>
        <div style="float: left; width: 16.6%"><?= lang('frontend:cartridge:orders:table:close_date');?></div>
        <? foreach ($not_active_orders as $not_active_order) { ?>
        <? foreach ($cartridges as $cartridge) { ?>
        <? if ($not_active_order->cartridge_id == $cartridge->id and $not_active_order->status == 0) { ?>
        <div style="float: left; width: 16.6%"><?= $not_active_order->id; ?></div>
        <div style="float: left; width: 16.6%"><?= $cartridge->name; ?></div>
        <div style="float: left; width: 16.6%"><?= $not_active_order->count_request; ?></div>
        <div style="float: left; width: 16.6%"><?= isset($active_order->comment) ? $active_order->comment.'&nbsp;' : '&nbsp;'; ?></div>
        <div style="float: left; width: 16.6%"><?= $not_active_order->count_recived; ?></div>
        <div style="float: left; width: 16.6%"><?= $not_active_order->date_close; ?></div>

        <? } ?>
        <? } ?>
        <? } ?>
<? } else { ?>
<p><?= lang('frontend:cartridge:messages:no_orders');?></p>
<? } ?>