<?php
require_once 'config.php';
require_once 'global.php';
require_once 'mysql/MysqliDb.php';
require_once 'api/vk_api.php';
//require_once 'api/yandex_api.php';
require_once 'bot.php';

//log_msg(constants::buttons1);
if (!isset($_REQUEST)) {
  exit;
}
/*$json = '{"date":1597824550,"from_id":421078460,"id":399,"out":0,"peer_id":421078460,"text":"","conversation_message_id":268,"fwd_messages":[],"important":false,"random_id":0,"attachments":[{"type":"photo","photo":{"album_id":-3,"date":1597824548,"id":457240207,"owner_id":421078460,"has_tags":false,"access_key":"4a9abe4ddbcf9f412a","sizes":[{"height":130,"url":"https:\/\/sun9-19.userapi.com\/w3YYhYB31xWEm_t6nJbOm7jnEpxP3R8qTJO5Lw\/Z_fSRWimwbw.jpg","type":"m","width":73},{"height":232,"url":"https:\/\/sun9-2.userapi.com\/_95ktXeZTHbMjLPwY3FHKTzCfMbxL9hsrOUQUA\/ZSCLn_wcsZs.jpg","type":"o","width":130},{"height":356,"url":"https:\/\/sun9-43.userapi.com\/cm3NJ3Xv1IhSj70O7BqI5v17hByVLrBCngfhMQ\/rwc2WWwsiyI.jpg","type":"p","width":200},{"height":570,"url":"https:\/\/sun9-30.userapi.com\/atizt_Z3M34xvtVJlScgS_sivupds3xuGusFQw\/wD_hJb47nhw.jpg","type":"q","width":320},{"height":900,"url":"https:\/\/sun9-39.userapi.com\/1frJc4JX_tFPT9FtbZOiaQL3RQsmnhodh0ODaQ\/E1JRtsoKkho.jpg","type":"r","width":510},{"height":75,"url":"https:\/\/sun9-25.userapi.com\/MYAdVBvYobyTZk_oQxydT4u_wIlT5K-jX6BCTw\/Uudxl2kuODY.jpg","type":"s","width":42},{"height":604,"url":"https:\/\/sun9-17.userapi.com\/F0KNOn354XT4BDsPAs2Csau-6JmepGpnx31Twg\/DyKA9SzbXrQ.jpg","type":"x","width":339},{"height":807,"url":"https:\/\/sun9-37.userapi.com\/yjjzxRVOD0oykcqF7vaADLY9M5U9pnxjmvk9EA\/lbCa-B6zxNU.jpg","type":"y","width":453},{"height":960,"url":"https:\/\/sun9-68.userapi.com\/rqv6rEBhWXq4o_ZTxUyjIfWkrO2LCfunBLXL-Q\/Pfyw1wa2tu0.jpg","type":"z","width":539}],"text":""}}],"is_hidden":false}';
$json = json_decode($json, true);
echo json_encode($json);
exit;*/

callback_handleEvent();

function callback_handleEvent() {
  $event = _callback_getEvent();
  $event = initVars($event, $id, $message, $payload, $user_id, $type, $attachments);
  try {
    switch ($event['type']) {
      //Подтверждение сервера
      case CALLBACK_API_EVENT_CONFIRMATION:
        _callback_response(CALLBACK_API_CONFIRMATION_TOKEN);
        break;

      //Получение нового сообщения
      case CALLBACK_API_EVENT_MESSAGE_NEW:
        log_msg($event['object']['message']);
        //log_msg($attachments);
        _mysql_getUserByIdVK($user, $user_id);
        if (empty($user))
          _callback_newMessage($user_id);
        else
          _callback_switchNewMessage($user, $user_id, $message, $payload, $attachments);
        break;

      default:
        //_callback_response('Unsupported event');
        break;
    }
  } catch (Exception $e) {
    log_error($e);
  }

  _callback_okResponse();
}

