<?php

define('BOT_BASE_DIRECTORY', '.');
define('BOT_LOGS_DIRECTORY', BOT_BASE_DIRECTORY.'/logs');
define('BOT_IMAGES_DIRECTORY', BOT_BASE_DIRECTORY.'/static');
define('BOT_AUDIO_DIRECTORY', BOT_BASE_DIRECTORY.'/audio');

define('CALLBACK_API_CONFIRMATION_TOKEN', '13c4ff6e'); //Строка для подтверждения адреса сервера из настроек Callback API
define('VK_API_ACCESS_TOKEN', '0a24def73d3dc48c06b4a64bcbc4d896a094fdb8af0ac1a235d961c451a5d98c899218438b92dbf4eabdd'); //Ключ доступа сообщества 
//define('YANDEX_API_KEY', '30e3213440-61233-1294-b3415-471212369886'); //Ключ для доступа к Yandex Speech Kit

define('VK_API_VERSION', '5.122'); //Используемая версия API
define('VK_API_ENDPOINT', 'https://api.vk.com/method/');

define('HOST', 'localhost');
define('USERNAME', 'f0460625');
define('PASSWORD', '546124qQ');
define('DATABASE_NAME', 'f0460625');

define('CALLBACK_API_EVENT_CONFIRMATION', 'confirmation');
define('CALLBACK_API_EVENT_MESSAGE_NEW', 'message_new');

define('QUESTION_KEYBOARD_1', "Что вы ищете?\n1. Общение\n2. Выпить\n3. Все равно");
define('QUESTION_KEYBOARD_2', "Кого вы ищете?\n1. Парня\n2. Девушку\n3. Компанию\n4. Все равно");
define('QUESTION_KEYBOARD_3', "Где вы хотите выпить?\n1. У себя\n2. У кого-то\n3. Все равно");
define('QUESTION_KEYBOARD_4', "Кто вы?\n1. Парень\n2. Девушка\n3. Компания");
define('QUESTION_KEYBOARD_5', "Ваше имя/имена?");
define('QUESTION_KEYBOARD_6', "Сколько вам лет?");
define('QUESTION_KEYBOARD_7', "Ваш город?");
define('QUESTION_KEYBOARD_8', "Текст анкеты. Расскажите о себе или укажите какую-нибудь другую информацию");
define('QUESTION_KEYBOARD_9', "Фото которое будет отображатся в ваше анкете");
define('QUESTION_KEYBOARD_10', "С какого города показывать анкеты?\n1. Желательно с моего\n2. С любого");
define('QUESTION_KEYBOARD_MAIN_MENU', "1. Показать настройки моей анкеты\n2. Показать мою анкету\n3. Просмотр анкет\n4. Я больше не хочу никого искать");

class Consts {
	//----------------------------------------------------------------------------
  const buttons = array(
  'one_time' => false,
  'buttons'  => array(
    array(
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_begin'),
          	'label'   => '1. Заполнить анкету',
          ),
          'color'   => 'positive',
        ),
      ),
    ),
  );


      /*array(
      array(
          'action'  => array(
          'type'    => 'location',
          //'payload' => array('button' => 1),
          ),
          //'color'   => 'negative'
        ),
      ),*/

//----------------Что ты ищешь?\n1. Общение\n2. Выпить\n3. Все равно----------------------------------
  const buttons1 = array(
  'one_time' => false,
  'buttons'  => array(
    array(
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_1_1'),
          	'label'   => '1. &#128172;',
          ),
          'color'   => 'positive',
        ),
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_1_2'),
          	'label'   => '2. &#127864;',
          ),
          'color'   => 'positive',
        ),
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_1_3'),
          	'label'   => '3. Все равно',
          ),
          'color'   => 'positive',
        ),
      ),
    ),
  );
  //Кого ты ищешь?\n1. Парня\n2. Девушку\n3. Компанию\n4. Все равно------------------------------------------------
  const buttons2 = array(
  'one_time' => false,
  'buttons'  => array(
    array(
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_2_1'),
          	'label'   => '1. &#128113;',
          ),
          'color'   => 'positive',
        ),
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_2_2'),
          	'label'   => '2. &#128590;',
          ),
          'color'   => 'positive',
        ),
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_2_3'),
          	'label'   => '3. &#128107;',
          ),
          'color'   => 'positive',
        ),
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_2_4'),
          	'label'   => '4. Все равно',
          ),
          'color'   => 'positive',
        ),
      ),
    ),
  );
//Где ты хочешь выпить?\n1. У себя\n2. У кого-то\n3. Все равно---------------------------------------------------
  const buttons3 = array(
  'one_time' => false,
  'buttons'  => array(
    array(
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_3_1'),
          	'label'   => '1. У себя',
          ),
          'color'   => 'positive',
        ),
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_3_2'),
          	'label'   => '2. У кого-то',
          ),
          'color'   => 'positive',
        ),
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_3_3'),
          	'label'   => '3. Все равно',
          ),
          'color'   => 'positive',
        ),
      ),
    ),
  );
//Кто ты?\n1. Парень\n2. Девушка\n3. Компания---------------------------------------------------
  const buttons4 = array(
  'one_time' => false,
  'buttons'  => array(
    array(
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_4_1'),
          	'label'   => '1. Парень',
          ),
          'color'   => 'positive',
        ),
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_4_2'),
          	'label'   => '2. Девушка',
          ),
          'color'   => 'positive',
        ),
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_4_3'),
          	'label'   => '3. Компания',
          ),
          'color'   => 'positive',
        ),
      ),
    ),
  );
//С какого города показывать анкеты?\n1. Желательно с моего\n2. С любого-------------------------------------------
  const buttons10 = array(
  'one_time' => false,
  'buttons'  => array(
    array(
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_10_1'),
          	'label'   => '1. Желательно с моего',
          ),
          'color'   => 'positive',
        ),
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('keyboard_10_2'),
          	'label'   => '2. С любого',
          ),
          'color'   => 'positive',
        ),
      ),
    ),
  );
  const main_menu = array(
  'one_time' => false,
  'buttons'  => array(
    array(
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('main_menu_1'),
          	'label'   => '1.',
          ),
          'color'   => 'positive',
        ),
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('main_menu_2'),
          	'label'   => '2.',
          ),
          'color'   => 'positive',
        ),
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('main_menu_3'),
          	'label'   => '3.',
          ),
          'color'   => 'positive',
        ),
      array(
          'action'  => array(
          	'type'    => 'text',
          	'payload' => array('main_menu_4'),
          	'label'   => '4.',
          ),
          'color'   => 'positive',
        ),
      ),
    ),
  );
  const clear_buttons = array(
  'one_time' => true,
  'buttons'  => array(),
  );

  const error_comand = "Нет такой команды";

  function get_buts($buttons) {
  	switch ($buttons) {
   		case 'begin':
  			return json_encode(self::buttons, JSON_UNESCAPED_UNICODE);
  			break;
  		case 1:
  			return json_encode(self::buttons1, JSON_UNESCAPED_UNICODE);
  			break;
  		case 2:
  			return json_encode(self::buttons2, JSON_UNESCAPED_UNICODE);
  			break;
  		case 3:
  			return json_encode(self::buttons3, JSON_UNESCAPED_UNICODE);
  			break;
  		case 4:
  			return json_encode(self::buttons4, JSON_UNESCAPED_UNICODE);
  			break;
  		case 5:
  			# code...
  			break;
  		case 6:
  			# code...
  			break;
  		case 7:
  			# code...
  			break;
  		case 8:
  			# code...
  			break;
  		case 9:
  			# code...
  			break;
  		case 10:
  			return json_encode(self::buttons10, JSON_UNESCAPED_UNICODE);
  			break;
  		case 'clear':
  			return json_encode(self::clear_buttons, JSON_UNESCAPED_UNICODE);
  			break;
  		case 'main_menu':
  			return json_encode(self::main_menu, JSON_UNESCAPED_UNICODE);
  			break;
  	}
  }
  function get_answer($keyboard, $value){
  	$text = '';
  	switch ($keyboard) {
  		case 'keyboard_1':
  			$text = "Что вы ищете?\n- ";
  			switch ($value) {
  				case 1:
  					$text .= "Общение\n";
  					break;
  				case 2:
  					$text .= "Выпить\n";
  					break;
  				case 3:
  					$text .= "Все равно\n";
  					break;
  			}
  			break;
  		case 'keyboard_2':
  			$text = "Кого вы ищете?\n- ";
  			switch ($value) {
  				case 1:
  					$text .= "Парня\n";
  					break;
  				case 2:
  					$text .= "Девушку\n";
  					break;
  				case 3:
  					$text .= "Компанию\n";
  					break;
  				case 4:
  					$text .= "Все равно\n";
  					break;
  			}
  			break;
  		case 'keyboard_3':
  			$text = "Где вы хотите выпить?\n- ";
  			switch ($value) {
  				case 1:
  					$text .= "У себя\n";
  					break;
  				case 2:
  					$text .= "У кого-то\n";
  					break;
  				case 3:
  					$text .= "Все равно\n";
  					break;
  			}
  			break;
  		case 'keyboard_4':
  			$text = "Кто вы?\n- ";
  			switch ($value) {
  				case 1:
  					$text .= "Парень\n";
  					break;
  				case 2:
  					$text .= "Девушка\n";
  					break;
  				case 3:
  					$text .= "Компания\n";
  					break;
  			}
  			break;
  		case 'keyboard_5':
  			$text = "Ваше имя/имена?\n- ".$value."\n";
  			break;
  		case 'keyboard_6':
  			$text = "Сколько вам лет?\n- ".$value."\n";
  			break;
  		case 'keyboard_7':
  			$text = "Ваш город?\n- ".$value."\n";
  			break;
  		case 'keyboard_8':
  			$text = "Текст анкеты.\n- ".$value."\n";
  			break;
  		case 'keyboard_9':
  			//$text = "Ваше имя/имена? ".$value."\n";
  			break;
  		case 'keyboard_10':
  			$text = "С какого города показывать анкеты?\n- ";
  			switch ($value) {
  				case 1:
  					$text .= "Желательно с моего\n";
  					break;
  				case 2:
  					$text .= "С любого\n";
  					break;
  			}
  			break;
  	}
  	return $text;
  }
}