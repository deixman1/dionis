<?php

function bot_sendMessage($user_id, $msg, $buttons = null, $attachments = null) {
  $data = array(
    'message' => $msg,
    'peer_id' => $user_id,
    'random_id'  => 0,
  );
  if(!empty($buttons))
    $data['keyboard'] = $buttons;
  if(!empty($attachments)) {
    //$photo = _bot_uploadPhoto($user_id, BOT_IMAGES_DIRECTORY.'/cat.jpeg');

    /*$voice_message_file_name = yandexApi_getVoice($msg);
    $doc = _bot_uploadVoiceMessage($user_id, $voice_message_file_name);*/
    $attachments = array(
      //'photo'.$photo['owner_id'].'_'.$photo['id'],
      //'doc'.$doc['owner_id'].'_'.$doc['id'],
    );
  }
  

  vkApi_messagesSend($data);
}

function _bot_uploadPhoto($user_id, $file_name) {
  $upload_server_response = vkApi_photosGetMessagesUploadServer($user_id);
  $upload_response = vkApi_upload($upload_server_response['upload_url'], $file_name);
  log_msg($upload_response);
  $photo = $upload_response['photo'];
  $server = $upload_response['server'];
  $hash = $upload_response['hash'];

  $save_response = vkApi_photosSaveMessagesPhoto($photo, $server, $hash);
  $photo = array_pop($save_response);

  return $photo;
}

function _callback_newMessage($user_id)
{
  $users_get_response = vkApi_usersGet($user_id);
  $user = array_pop($users_get_response);
  $data = array("user_id" => $user_id,
               "first_name" => $user['first_name'],
               "last_keyboard" => 'keyboard_begin',
             );
  _mysql_connect_db($db);
  $id = $db->insert('users', $data);
  $db->disconnect();
  $msg = "Привет, {$user['first_name']}!\nя помогу тебе найти с кем выпить или просто пообщаться\n\n1. Заполнить анкету";
  bot_sendMessage($user_id, $msg, Consts::get_buts('begin'));
}
function _callback_switchNewMessage($user, $user_id, $message, $payload, $attachments)
{
  $last_keyboard = $user['last_keyboard'];
  if(empty($payload))
    switch ($last_keyboard) {
      case 'keyboard_begin':
        if($message == '1') {
          bot_sendMessage($user_id, QUESTION_KEYBOARD_1, Consts::get_buts(1));
          _mysql_updateLastKeyboard($user_id, 'keyboard_1');
        }
        else {
          bot_sendLastKeyboard($user_id, $last_keyboard);
        }
        break;
      case 'keyboard_1':
        switch ($message) {
          case '1':
            bot_writeData($user_id, QUESTION_KEYBOARD_2, Consts::get_buts(2), $last_keyboard, 1, 'keyboard_2');
            break;
          case '2':
            bot_writeData($user_id, QUESTION_KEYBOARD_2, Consts::get_buts(2), $last_keyboard, 2, 'keyboard_2');
            break;
          case '3':
            bot_writeData($user_id, QUESTION_KEYBOARD_2, Consts::get_buts(2), $last_keyboard, 3, 'keyboard_2');
            break;
          default:
            bot_sendLastKeyboard($user_id, $last_keyboard);
            break;
        }
        break;
      case 'keyboard_2':
        switch ($message) {
          case '1':
            if ($user['keyboard_1'] != 1)
              bot_writeData($user_id, QUESTION_KEYBOARD_3, Consts::get_buts(3), $last_keyboard, 1, 'keyboard_3');
            else
              bot_writeData($user_id, QUESTION_KEYBOARD_4, Consts::get_buts(4), $last_keyboard, 1, 'keyboard_4');
            break;
          case '2':
            if ($user['keyboard_1'] != 1)
              bot_writeData($user_id, QUESTION_KEYBOARD_3, Consts::get_buts(3), $last_keyboard, 2, 'keyboard_3');
            else
              bot_writeData($user_id, QUESTION_KEYBOARD_4, Consts::get_buts(4), $last_keyboard, 2, 'keyboard_4');
            break;
          case '3':
            if ($user['keyboard_1'] != 1)
              bot_writeData($user_id, QUESTION_KEYBOARD_3, Consts::get_buts(3), $last_keyboard, 3, 'keyboard_3');
            else
              bot_writeData($user_id, QUESTION_KEYBOARD_4, Consts::get_buts(4), $last_keyboard, 3, 'keyboard_4');
            break;
          case '4':
            if ($user['keyboard_1'] != 1)
              bot_writeData($user_id, QUESTION_KEYBOARD_3, Consts::get_buts(3), $last_keyboard, 4, 'keyboard_3');
            else
              bot_writeData($user_id, QUESTION_KEYBOARD_4, Consts::get_buts(4), $last_keyboard, 4, 'keyboard_4');
            break;
          default:
            bot_sendLastKeyboard($user_id, $last_keyboard);
            break;
        }
        break;
      case 'keyboard_3':
        switch ($message) {
          case '1':
            bot_writeData($user_id, QUESTION_KEYBOARD_4, Consts::get_buts(4), $last_keyboard, 1, 'keyboard_4');
            break;
          case '2':
            bot_writeData($user_id, QUESTION_KEYBOARD_4, Consts::get_buts(4), $last_keyboard, 2, 'keyboard_4');
            break;
          case '3':
            bot_writeData($user_id, QUESTION_KEYBOARD_4, Consts::get_buts(4), $last_keyboard, 3, 'keyboard_4');
            break;
          default:
            bot_sendLastKeyboard($user_id, $last_keyboard);
            break;
        }
        break;
      case 'keyboard_4':
        switch ($message) {
          case '1':
            bot_writeData($user_id, QUESTION_KEYBOARD_5, Consts::get_buts('clear'), $last_keyboard, 1, 'keyboard_5');
            break;
          case '2':
            bot_writeData($user_id, QUESTION_KEYBOARD_5, Consts::get_buts('clear'), $last_keyboard, 2, 'keyboard_5');
            break;
          case '3':
            bot_writeData($user_id, QUESTION_KEYBOARD_5, Consts::get_buts('clear'), $last_keyboard, 3, 'keyboard_5');
            break;
          default:
            bot_sendLastKeyboard($user_id, $last_keyboard);
            break;
        }
        break;
      case 'keyboard_5':
        bot_writeData($user_id, QUESTION_KEYBOARD_6, Consts::get_buts('clear'), $last_keyboard, $message, 'keyboard_6');
        break;
      case 'keyboard_6':
        bot_writeData($user_id, QUESTION_KEYBOARD_7, Consts::get_buts('clear'), $last_keyboard, $message, 'keyboard_7');
        break;
      case 'keyboard_7':
        bot_writeData($user_id, QUESTION_KEYBOARD_8, Consts::get_buts('clear'), $last_keyboard, $message, 'keyboard_8');
        break;
      case 'keyboard_8':
        bot_writeData($user_id, QUESTION_KEYBOARD_9, Consts::get_buts('clear'), $last_keyboard, $message, 'keyboard_9');
        break;
      case 'keyboard_9':
        if(empty($attachments)){
          bot_sendMessage($user_id, "Фотография не найдена!", Consts::get_buts('clear'));
        }
        else{
          $photo = 'photo'.$attachments['owner_id'].'_'.$attachments['id'];
          bot_writeData($user_id, QUESTION_KEYBOARD_10, Consts::get_buts(10), $last_keyboard, $photo, 'keyboard_10');
        }
        break;
      case 'keyboard_10':
        switch ($message) {
          case '1':
          bot_writeData($user_id, QUESTION_KEYBOARD_MAIN_MENU, Consts::get_buts('main_menu'), $last_keyboard, 1, 'main_menu');
            break;
          case '2':
            bot_writeData($user_id, QUESTION_KEYBOARD_MAIN_MENU, Consts::get_buts('main_menu'), $last_keyboard, 2, 'main_menu');
            break;
          default:
            bot_sendLastKeyboard($user_id, $last_keyboard);
            break;
        }
        break;
      case 'main_menu':
        switch ($message) {
          case '1':
            foreach ($user as $key => $value) {
              $msg .= Consts::get_answer($key, $value);
            }
            bot_sendMessage($user_id, $msg, Consts::get_buts('clear'));
            bot_sendMessage($user_id, QUESTION_KEYBOARD_MAIN_MENU, Consts::get_buts('main_menu'));
            break;
          case '2':
            bot_sendLastKeyboard($user_id, $last_keyboard);
            break;
          case '3':
            bot_sendLastKeyboard($user_id, $last_keyboard);
            break;
          case '4':
            bot_sendLastKeyboard($user_id, $last_keyboard);
            break;
          default:
            bot_sendLastKeyboard($user_id, $last_keyboard);
            break;
        }
        break;
    }
  else
    switch ($payload) {
      case 'keyboard_begin':
        bot_sendMessage($user_id, QUESTION_KEYBOARD_1, Consts::get_buts(1));
        _mysql_updateLastKeyboard($user_id, 'keyboard_1');
        break;
      case 'keyboard_1_1':
        bot_writeData($user_id, QUESTION_KEYBOARD_2, Consts::get_buts(2), $last_keyboard, 1, 'keyboard_2');
        break;
      case 'keyboard_1_2':
        bot_writeData($user_id, QUESTION_KEYBOARD_2, Consts::get_buts(2), $last_keyboard, 2, 'keyboard_2');
        break;
      case 'keyboard_1_3':
        bot_writeData($user_id, QUESTION_KEYBOARD_2, Consts::get_buts(2), $last_keyboard, 3, 'keyboard_2');
        break;
      case 'keyboard_2_1':
        if ($user['keyboard_1'] != 1)
          bot_writeData($user_id, QUESTION_KEYBOARD_3, Consts::get_buts(3), $last_keyboard, 1, 'keyboard_3');
        else
          bot_writeData($user_id, QUESTION_KEYBOARD_4, Consts::get_buts(4), $last_keyboard, 1, 'keyboard_4');
        break;
      case 'keyboard_2_2':
        if ($user['keyboard_1'] != 1)
          bot_writeData($user_id, QUESTION_KEYBOARD_3, Consts::get_buts(3), $last_keyboard, 2, 'keyboard_3');
        else
          bot_writeData($user_id, QUESTION_KEYBOARD_4, Consts::get_buts(4), $last_keyboard, 2, 'keyboard_4');
        break;
      case 'keyboard_2_3':
        if ($user['keyboard_1'] != 1)
          bot_writeData($user_id, QUESTION_KEYBOARD_3, Consts::get_buts(3), $last_keyboard, 3, 'keyboard_3');
        else
          bot_writeData($user_id, QUESTION_KEYBOARD_4, Consts::get_buts(4), $last_keyboard, 3, 'keyboard_4');
        break;
      case 'keyboard_2_4':
        if ($user['keyboard_1'] != 1)
          bot_writeData($user_id, QUESTION_KEYBOARD_3, Consts::get_buts(3), $last_keyboard, 4, 'keyboard_3');
        else
          bot_writeData($user_id, QUESTION_KEYBOARD_4, Consts::get_buts(4), $last_keyboard, 4, 'keyboard_4');
        break;
      case 'keyboard_3_1':
        bot_writeData($user_id, QUESTION_KEYBOARD_4, Consts::get_buts(4), $last_keyboard, 1, 'keyboard_4');
        break;
      case 'keyboard_3_2':
        bot_writeData($user_id, QUESTION_KEYBOARD_4, Consts::get_buts(4), $last_keyboard, 2, 'keyboard_4');
        break;
      case 'keyboard_3_3':
        bot_writeData($user_id, QUESTION_KEYBOARD_4, Consts::get_buts(4), $last_keyboard, 3, 'keyboard_4');
        break;
      case 'keyboard_4_1':
        bot_writeData($user_id, QUESTION_KEYBOARD_5, Consts::get_buts('clear'), $last_keyboard, 1, 'keyboard_5');
        break;
      case 'keyboard_4_2':
        bot_writeData($user_id, QUESTION_KEYBOARD_5, Consts::get_buts('clear'), $last_keyboard, 2, 'keyboard_5');
        break;
      case 'keyboard_4_3':
        bot_writeData($user_id, QUESTION_KEYBOARD_5, Consts::get_buts('clear'), $last_keyboard, 3, 'keyboard_5');
        break;
      case 'keyboard_10_1':
        bot_writeData($user_id, QUESTION_KEYBOARD_MAIN_MENU, Consts::get_buts('main_menu'), $last_keyboard, 1, 'main_menu');
        break;
      case 'keyboard_10_2':
        bot_writeData($user_id, QUESTION_KEYBOARD_MAIN_MENU, Consts::get_buts('main_menu'), $last_keyboard, 2, 'main_menu');
        break;
      case 'main_menu_1':
        foreach ($user as $key => $value) {
          $msg .= Consts::get_answer($key, $value);
        }
        bot_sendMessage($user_id, $msg, Consts::get_buts('clear'));
        bot_sendMessage($user_id, QUESTION_KEYBOARD_MAIN_MENU, Consts::get_buts('main_menu'));
        break;
    }
}
function bot_sendLastKeyboard($user_id, $last_keyboard)
{
  switch ($last_keyboard) {
    case 'keyboard_begin':
      bot_sendMessage($user_id, Consts::error_comand, Consts::get_buts('begin'));
      break;
    case 'keyboard_1':
      bot_sendMessage($user_id, Consts::error_comand, Consts::get_buts(1));
      break;
    case 'keyboard_2':
      bot_sendMessage($user_id, Consts::error_comand, Consts::get_buts(2));
      break;
    case 'keyboard_3':
      bot_sendMessage($user_id, Consts::error_comand, Consts::get_buts(3));
      break;
    case 'keyboard_4':
      bot_sendMessage($user_id, Consts::error_comand, Consts::get_buts(4));
      break;
    case 'keyboard_5':
      bot_sendMessage($user_id, Consts::error_comand, Consts::get_buts(5));
      break;
    case 'keyboard_6':
      bot_sendMessage($user_id, Consts::error_comand, Consts::get_buts(6));
      break;
    case 'keyboard_7':
      bot_sendMessage($user_id, Consts::error_comand, Consts::get_buts(7));
      break;
    case 'keyboard_8':
      bot_sendMessage($user_id, Consts::error_comand, Consts::get_buts(8));
      break;
    case 'keyboard_9':
      bot_sendMessage($user_id, Consts::error_comand, Consts::get_buts(9));
      break;
    case 'keyboard_10':
      bot_sendMessage($user_id, Consts::error_comand, Consts::get_buts(9));
      break;
    case 'main_menu':
      bot_sendMessage($user_id, Consts::error_comand, Consts::get_buts(9));
      break;
  }
}

function bot_writeData($user_id, $question, $buttons, $last_keyboard, $option, $updateKeyboard)
{
  bot_sendMessage($user_id, $question, $buttons);
  _mysql_updateOptions($user_id, $last_keyboard, $option);
  _mysql_updateLastKeyboard($user_id, $updateKeyboard);
}

/*function _bot_uploadVoiceMessage($user_id, $file_name) {
  $upload_server_response = vkApi_docsGetMessagesUploadServer($user_id, 'audio_message');
  $upload_response = vkApi_upload($upload_server_response['upload_url'], $file_name);

  $file = $upload_response['file'];

  $save_response = vkApi_docsSave($file, 'Voice message');
  $doc = array_pop($save_response);

  return $doc;
}*/
