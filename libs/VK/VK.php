<?php
declare(strict_types=1);

namespace Libs\VK;


use Curl\Curl;
use Exception;
use Libs\VK\Message\Message;

class VK implements VKInterface
{
    private const CALLBACK_API_CONFIRMATION_TOKEN = CALLBACK_API_CONFIRMATION_TOKEN;
    private const VK_API_ACCESS_TOKEN = VK_API_ACCESS_TOKEN;
    private const VK_API_ENDPOINT = 'https://api.vk.com/method/';
    private const VK_API_VERSION = 5.130;

    /**
     * @return Message
     */
    public function getMessage(): Message
    {
        return new Message();
    }

    /**
     * @return Message
     */
    public function getConfirmationToken(): string
    {
        return self::CALLBACK_API_CONFIRMATION_TOKEN;
    }

    /**
     * @param string $method
     * @param array $params
     * @return string
     * @throws Exception
     */
    public function call(string $method, array $params): string
    {
        $curl = new Curl();
        $params['access_token'] = self::VK_API_ACCESS_TOKEN;
        $params['v'] = self::VK_API_VERSION;

        $curl->setOpt(CURLOPT_RETURNTRANSFER, true);

        $curl->get(self::VK_API_ENDPOINT . $method, $params);

        if ($curl->error) {
            throw new Exception("Failed {$method} request\n{$curl->error}");
        }

        return $curl->response;
    }

//    function vkApi_messagesSend($data = array())
//    {
//        return _vkApi_call('messages.send', $data);
//    }
//
//    function _callback_okResponse()
//    {
//        _callback_response('ok');
//    }
//
//    function _callback_response($data)
//    {
//        echo $data;
//        exit();
//    }
//
//    function _callback_getEvent()
//    {
//        return json_decode(file_get_contents('php://input'), true);
//    }
//
//    function _mysql_connect_db(&$db)
//    {
//        $db = new MysqliDb (HOST, USERNAME, PASSWORD, DATABASE_NAME);
//        $db->autoReconnect = false;
//    }
//
//    function _mysql_getUserByIdVK(&$user, $user_id)
//    {
//        _mysql_connect_db($db);
//        $db->where("user_id", $user_id);
//        $user = $db->getOne("users");
//        $db->disconnect();
//    }
//
//    function _mysql_updateLastKeyboard($user_id, $last_keyboard)
//    {
//        _mysql_connect_db($db);
//        $data = array('last_keyboard' => $last_keyboard);
//        $db->where('user_id', $user_id);
//        $db->update('users', $data);
//        $db->disconnect();
//    }
//
//    function _mysql_updateOptions($user_id, $keyboard, $value)
//    {
//        _mysql_connect_db($db);
//        $data = array($keyboard => $value);
//        $db->where('user_id', $user_id);
//        $db->update('users', $data);
//        $db->disconnect();
//    }
//
//    function initVars($event, &$id, &$message, &$payload, &$user_id, &$type, &$attachments)
//    {
//        $data = $event;
//        $data_backup = $event;
//        $type = isset($data['type']) ? $data['type'] : null;
//        if (isset($data['object']['message']) and $type == 'message_new') {
//            $data['object'] = $data['object']['message']; //какая-то дичь с ссылками, но $this->data теперь тоже переопределился
//        }
//        $id = isset($data['object']['peer_id']) ? $data['object']['peer_id'] : null;
//        $message = isset($data['object']['text']) ? $data['object']['text'] : null;
//        $payload = isset($data['object']['payload']) ? json_decode($data['object']['payload'], true) : null;
//        $payload = $payload[0];
//        $attachments = isset($data['object']['attachments'][0]['photo']['sizes']) ? $data['object']['attachments'][0]['photo'] : null;
//        $user_id = isset($data['object']['from_id']) ? $data['object']['from_id'] : null;
//        $data = $data_backup;
//        return $data_backup;
//    }
//
//    function vkApi_usersGet($user_id)
//    {
//        return _vkApi_call('users.get', array(
//            'user_id' => $user_id,
//            'fields' => 'city,bdate',
//        ));
//    }
//
//    function vkApi_photosGetMessagesUploadServer($peer_id)
//    {
//        return _vkApi_call('photos.getMessagesUploadServer', array(
//            'peer_id' => $peer_id,
//        ));
//    }
//
//    /*function vkApi_getPhotoOriginalSize($peer_id) {
//      $res = _vkApi_call('photos.get', array(
//        'owner_id' => $peer_id,
//        'album_id' => 'profile',
//        'rev' => 1,
//        'count' => 1,
//      ));
//      log_msg(json_encode($res));
//    }*/
//
//    function vkApi_getAge($date)
//    {
//        $birthDate = explode(".", $date);
//        return (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
//            ? ((date("Y") - $birthDate[2]) - 1)
//            : (date("Y") - $birthDate[2]));
//    }
//
//    function vkApi_photosSaveMessagesPhoto($photo, $server, $hash)
//    {
//        return _vkApi_call('photos.saveMessagesPhoto', array(
//            'photo' => $photo,
//            'server' => $server,
//            'hash' => $hash,
//        ));
//    }
//
//    function vkApi_docsGetMessagesUploadServer($peer_id, $type)
//    {
//        return _vkApi_call('docs.getMessagesUploadServer', array(
//            'peer_id' => $peer_id,
//            'type' => $type,
//        ));
//    }
//
//    /*function vkApi_docsSave($file, $title) {
//      return _vkApi_call('docs.save', array(
//        'file'  => $file,
//        'title' => $title,
//      ));
//    }*/
//
//    function vkApi_upload($url, $file_name)
//    {
//        /*if (!file_exists($file_name)) {
//          throw new Exception('File not found: '.$file_name);
//        }*/
//
//        $curl = curl_init($url);
//        curl_setopt($curl, CURLOPT_POST, true);
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($curl, CURLOPT_POSTFIELDS, array('file' => new CURLfile($file_name)));
//        $json = curl_exec($curl);
//        $error = curl_error($curl);
//        if ($error) {
//            log_error($error);
//            throw new Exception("Failed {$url} request");
//        }
//
//        curl_close($curl);
//
//        $response = json_decode($json, true);
//        if (!$response) {
//            throw new Exception("Invalid response for {$url} request");
//        }
//
//        return $response;
//    }
}
