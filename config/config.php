<?php
define('CALLBACK_API_CONFIRMATION_TOKEN', CALLBACK_API_CONFIRMATION_TOKEN); //Строка для подтверждения адреса сервера из настроек Callback API
define('VK_API_ACCESS_TOKEN', VK_API_ACCESS_TOKEN); //Ключ доступа сообщества

define('VK_API_VERSION', '5.122'); //Используемая версия API

define('HOST', 'localhost');
define('USERNAME', 'f0460625');
define('PASSWORD', '546124qQ');
define('DATABASE_NAME', 'f0460625');

define('CALLBACK_API_EVENT_CONFIRMATION', 'confirmation');
define('CALLBACK_API_EVENT_MESSAGE_NEW', 'message_new');

//class Consts
//{
//    //----------------------------------------------------------------------------
//    const buttons = array(
//        'one_time' => false,
//        'buttons' => array(
//            array(
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_begin'),
//                        'label' => '1. Заполнить анкету',
//                    ),
//                    'color' => 'positive',
//                ),
//            ),
//        ),
//    );
//
//
//    /*array(
//    array(
//        'action'  => array(
//        'type'    => 'location',
//        //'payload' => array('button' => 1),
//        ),
//        //'color'   => 'negative'
//      ),
//    ),*/
//
////----------------Что ты ищешь?\n1. Общение\n2. Выпить\n3. Все равно----------------------------------
//    const buttons1 = array(
//        'one_time' => false,
//        'buttons' => array(
//            array(
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_1_1'),
//                        'label' => '1. &#128172;',
//                    ),
//                    'color' => 'positive',
//                ),
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_1_2'),
//                        'label' => '2. &#127864;',
//                    ),
//                    'color' => 'positive',
//                ),
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_1_3'),
//                        'label' => '3. Все равно',
//                    ),
//                    'color' => 'positive',
//                ),
//            ),
//        ),
//    );
//    //Кого ты ищешь?\n1. Парня\n2. Девушку\n3. Компанию\n4. Все равно------------------------------------------------
//    const buttons2 = array(
//        'one_time' => false,
//        'buttons' => array(
//            array(
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_2_1'),
//                        'label' => '1. &#128113;',
//                    ),
//                    'color' => 'positive',
//                ),
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_2_2'),
//                        'label' => '2. &#128590;',
//                    ),
//                    'color' => 'positive',
//                ),
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_2_3'),
//                        'label' => '3. &#128107;',
//                    ),
//                    'color' => 'positive',
//                ),
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_2_4'),
//                        'label' => '4. Все равно',
//                    ),
//                    'color' => 'positive',
//                ),
//            ),
//        ),
//    );
////Где ты хочешь выпить?\n1. У себя\n2. У кого-то\n3. Все равно---------------------------------------------------
//    const buttons3 = array(
//        'one_time' => false,
//        'buttons' => array(
//            array(
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_3_1'),
//                        'label' => '1. У себя',
//                    ),
//                    'color' => 'positive',
//                ),
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_3_2'),
//                        'label' => '2. У кого-то',
//                    ),
//                    'color' => 'positive',
//                ),
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_3_3'),
//                        'label' => '3. Все равно',
//                    ),
//                    'color' => 'positive',
//                ),
//            ),
//        ),
//    );
////Кто ты?\n1. Парень\n2. Девушка\n3. Компания---------------------------------------------------
//    const buttons4 = array(
//        'one_time' => false,
//        'buttons' => array(
//            array(
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_4_1'),
//                        'label' => '1. Парень',
//                    ),
//                    'color' => 'positive',
//                ),
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_4_2'),
//                        'label' => '2. Девушка',
//                    ),
//                    'color' => 'positive',
//                ),
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_4_3'),
//                        'label' => '3. Компания',
//                    ),
//                    'color' => 'positive',
//                ),
//            ),
//        ),
//    );
////С какого города показывать анкеты?\n1. Желательно с моего\n2. С любого-------------------------------------------
//    const buttons10 = array(
//        'one_time' => false,
//        'buttons' => array(
//            array(
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_10_1'),
//                        'label' => '1. Желательно с моего',
//                    ),
//                    'color' => 'positive',
//                ),
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('keyboard_10_2'),
//                        'label' => '2. С любого',
//                    ),
//                    'color' => 'positive',
//                ),
//            ),
//        ),
//    );
//    const main_menu = array(
//        'one_time' => false,
//        'buttons' => array(
//            array(
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('main_menu_1'),
//                        'label' => '1.',
//                    ),
//                    'color' => 'positive',
//                ),
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('main_menu_2'),
//                        'label' => '2.',
//                    ),
//                    'color' => 'positive',
//                ),
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('main_menu_3'),
//                        'label' => '3.',
//                    ),
//                    'color' => 'positive',
//                ),
//                array(
//                    'action' => array(
//                        'type' => 'text',
//                        'payload' => array('main_menu_4'),
//                        'label' => '4.',
//                    ),
//                    'color' => 'positive',
//                ),
//            ),
//        ),
//    );
//    const clear_buttons = array(
//        'one_time' => true,
//        'buttons' => array(),
//    );
//
//    const error_comand = "Нет такой команды";
//
//    function get_buts($buttons)
//    {
//        switch ($buttons) {
//            case 'begin':
//                return json_encode(self::buttons, JSON_UNESCAPED_UNICODE);
//                break;
//            case 1:
//                return json_encode(self::buttons1, JSON_UNESCAPED_UNICODE);
//                break;
//            case 2:
//                return json_encode(self::buttons2, JSON_UNESCAPED_UNICODE);
//                break;
//            case 3:
//                return json_encode(self::buttons3, JSON_UNESCAPED_UNICODE);
//                break;
//            case 4:
//                return json_encode(self::buttons4, JSON_UNESCAPED_UNICODE);
//            case 5:
//                break;
//            case 6:
//                break;
//            case 7:
//                break;
//            case 8:
//                break;
//            case 9:
//                break;
//            case 10:
//                return json_encode(self::buttons10, JSON_UNESCAPED_UNICODE);
//                break;
//            case 'clear':
//                return json_encode(self::clear_buttons, JSON_UNESCAPED_UNICODE);
//                break;
//            case 'main_menu':
//                return json_encode(self::main_menu, JSON_UNESCAPED_UNICODE);
//                break;
//        }
//    }
//
//    function get_answer($keyboard, $value)
//    {
//        $text = '';
//        switch ($keyboard) {
//            case 'keyboard_1':
//                $text = "Что вы ищете?\n- ";
//                switch ($value) {
//                    case 1:
//                        $text .= "Общение\n";
//                        break;
//                    case 2:
//                        $text .= "Выпить\n";
//                        break;
//                    case 3:
//                        $text .= "Все равно\n";
//                        break;
//                }
//                break;
//            case 'keyboard_2':
//                $text = "Кого вы ищете?\n- ";
//                switch ($value) {
//                    case 1:
//                        $text .= "Парня\n";
//                        break;
//                    case 2:
//                        $text .= "Девушку\n";
//                        break;
//                    case 3:
//                        $text .= "Компанию\n";
//                        break;
//                    case 4:
//                        $text .= "Все равно\n";
//                        break;
//                }
//                break;
//            case 'keyboard_3':
//                $text = "Где вы хотите выпить?\n- ";
//                switch ($value) {
//                    case 1:
//                        $text .= "У себя\n";
//                        break;
//                    case 2:
//                        $text .= "У кого-то\n";
//                        break;
//                    case 3:
//                        $text .= "Все равно\n";
//                        break;
//                }
//                break;
//            case 'keyboard_4':
//                $text = "Кто вы?\n- ";
//                switch ($value) {
//                    case 1:
//                        $text .= "Парень\n";
//                        break;
//                    case 2:
//                        $text .= "Девушка\n";
//                        break;
//                    case 3:
//                        $text .= "Компания\n";
//                        break;
//                }
//                break;
//            case 'keyboard_5':
//                $text = "Ваше имя/имена?\n- " . $value . "\n";
//                break;
//            case 'keyboard_6':
//                $text = "Сколько вам лет?\n- " . $value . "\n";
//                break;
//            case 'keyboard_7':
//                $text = "Ваш город?\n- " . $value . "\n";
//                break;
//            case 'keyboard_8':
//                $text = "Текст анкеты.\n- " . $value . "\n";
//                break;
//            case 'keyboard_9':
//                //$text = "Ваше имя/имена? ".$value."\n";
//                break;
//            case 'keyboard_10':
//                $text = "С какого города показывать анкеты?\n- ";
//                switch ($value) {
//                    case 1:
//                        $text .= "Желательно с моего\n";
//                        break;
//                    case 2:
//                        $text .= "С любого\n";
//                        break;
//                }
//                break;
//        }
//        return $text;
//    }
//}