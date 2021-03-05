<?php


namespace Libs\VK\Messages;


use Libs\VK\Keyboard\Keyboard;
use Libs\VK\VK;
use PhpParser\Node\Expr\Cast\Double;

class Messages extends VK
{
    private const METHOD_SEND = 'messages.send';

    /**
     * Field user_id
     */
    private int $userId;
    /**
     * Field random_id
     */
    private int $randomId;
    /**
     * Field peer_id
     */
    private int $peerId;
    /**
     * Field peer_ids
     */
    private array $peerIds = ['int', 'int'];
    /**
     * Field domain
     */
    private string $domain;
    /**
     * Field chat_id
     */
    private int $chatId;
    /**
     * Field message
     */
    private string $message;
    /**
     * Field lat
     */
    private double $lat;
    /**
     * Field long
     */
    private double $long;
    /**
     * Field attachment
     */
    private string $attachment;
    /**
     * Field reply_to
     */
    private int $replyTo;
    /**
     * Field forward_messages
     */
    private array $forwardMessages = ['int', 'int'];
    /**
     * Field forward
     */
    private object $forward;
    /**
     * Field sticker_id
     */
    private int $stickerId;
    /**
     * Field group_id
     */
    private int $groupId;
    /**
     * Field keyboard
     */
    private Keyboard $keyboard;
    /**
     * Field template
     */
    private object $template;
    /**
     * Field payload
     */
    private int $payload;
    /**
     * Field content_source
     */
    private object $contentSource;
    /**
     * Field dont_parse_links
     */
    private int $dontParseLinks = 1;
    /**
     * Field disable_mentions
     */
    private int $disableMentions = 1;
    /**
     * Field intent
     */
    private string $intent = 'default';
    /**
     * Field subscribe_id
     */
    private int $subscribeId;

    public function send(array $params)
    {
        $this->call(self::METHOD_SEND, $params);
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->userId,
            'random_id' => $this->randomId,
            'peer_id' => $this->peerId,
            'peer_ids' => $this->peerIds,
            'domain' => $this->domain,
            'chat_id' => $this->chatId,
            'message' => $this->message,
            'lat' => $this->lat,
            'long' => $this->long,
            'attachment' => $this->attachment,
            'reply_to' => $this->replyTo,
            'forward_messages' => $this->forwardMessages,
            'forward' => $this->forward->toArray(),
            'sticker_id' => $this->stickerId,
            'group_id' => $this->groupId,
            'keyboard' => $this->keyboard->toArray(),
            'template' => $this->template->toArray(),
            'payload' => $this->payload,
            'content_source' => $this->contentSource->toArray(),
            'dont_parse_links' => $this->dontParseLinks,
            'disable_mentions' => $this->disableMentions,
            'intent' => $this->intent,
            'subscribe_id' => $this->subscribeId,
        ];
    }
}