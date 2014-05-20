<?php defined('BASEPATH') OR exit('No direct script access allowed');

$lang['main_settings'] = 'Главные настройки';
$lang['contractors_menu'] = 'Поставщики';
$lang['add_contractor'] = 'Добавить поставщика';
$lang['add_cartridge'] = 'Добавить картридж';
$lang['address'] = 'Адреса пользователей';
$lang['cartridge_list'] = 'Список картриджей';


//*********************************************
//
//              Front End
//
//**********************************************

$lang['frontend:cartridge:messages:no_address'] = 'У вас отсутствуетс адрес доставки, мы не можем продолжить. Обратитесь в службу поддежки.';
$lang['frontend:cartridge:messages:have_open_order'] = 'У вас есть не закрытые заявки. Перейдите в раздел <a href="'.base_url('cartridge/orders').'">ваши заявки</a> и закройте их.';
$lang['frontend:cartridge:messages:max_order'] = 'Вы заказали больше, чем для вас доступно в данный момент.';
$lang['frontend:cartridge:messages:order_is_close'] = 'Эта заявка уже закрыта';
$lang['frontend:cartridge:messages:id_not_valid'] = 'ID заявки который вы указали не верен';

$lang['frontend:cartridge:messages:added'] = 'Успешно добавлено';
$lang['frontend:cartridge:messages:close'] = 'Успешно закрыто';
$lang['frontend:cartridge:messages:no_orders'] = 'Нет активных заявок';

$lang['frontend:cartridge:index:title'] = 'Отправить заявку';
$lang['frontend:cartridge:index:cart_need'] = 'Укажите модель картриджа, необходимого вам';
$lang['frontend:cartridge:index:cart_count'] = 'Укажите количество';
$lang['frontend:cartridge:index:can_to_order'] = 'Вы можете заказать не более';
$lang['frontend:cartridge:index:comment'] = 'Комментарий (не обязательно)';

$lang['frontend:cartridge:orders:title'] = 'Ваши заказы';
$lang['frontend:cartridge:orders:table:open_orders'] = 'Открытые заявки';
$lang['frontend:cartridge:orders:table:close_orders'] = 'Закрытые заявки';
$lang['frontend:cartridge:orders:table:id'] = 'ID';
$lang['frontend:cartridge:orders:table:name'] = 'Имя';
$lang['frontend:cartridge:orders:table:requested'] = 'Вы заказали';
$lang['frontend:cartridge:orders:table:comment'] = 'Комментарий';
$lang['frontend:cartridge:orders:table:request_date'] = 'Дата заказа';
$lang['frontend:cartridge:orders:table:close_date'] = 'Дата закрытия';
$lang['frontend:cartridge:orders:table:recived'] = 'Вы получили';


$lang['frontend:buttons:save'] = 'Сохранить';
$lang['frontend:buttons:cancel'] = 'Отменить';
$lang['frontend:buttons:dropdown'] = 'Выберите...';


?>