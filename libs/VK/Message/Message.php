<?php
declare(strict_types=1);

namespace Libs\VK\Message;


use Libs\VK\Keyboard\Builder\KeyboardBuilder;
use Libs\VK\Keyboard\Keyboard;
use Libs\VK\VK;

class Message extends VK
{
    private const METHOD_SEND = 'messages.send';

    /**
     * Field user_id
     * @var int
     */
    private int $userId;
    /**
     * Field random_id
     * @var int
     */
    private int $randomId;
    /**
     * Field peer_id
     * @var int
     */
    private int $peerId;
    /**
     * Field peer_ids
     * @var array
     */
    private array $peerIds = ['int', 'int'];
    /**
     * Field domain
     * @var string
     */
    private string $domain;
    /**
     * Field chat_id
     * @var int
     */
    private int $chatId;
    /**
     * Field message
     * @var string
     */
    private string $message;
    /**
     * Field lat
     * @var float
     */
    private float $lat;
    /**
     * Field long
     * @var float
     */
    private float $long;
    /**
     * Field attachment
     * @var string
     */
    private string $attachment;
    /**
     * Field reply_to
     * @var int
     */
    private int $replyTo;
    /**
     * Field forward_messages
     * @var array
     */
    private array $forwardMessages = ['int', 'int'];
    /**
     * Field forward
     * @var object
     */
    private object $forward;
    /**
     * Field sticker_id
     * @var int
     */
    private int $stickerId;
    /**
     * Field group_id
     * @var int
     */
    private int $groupId;
    /**
     * Field keyboard
     * @var Keyboard
     */
    private Keyboard $keyboard;
    /**
     * Field template
     * @var object
     */
    private object $template;
    /**
     * Field payload
     * @var int
     */
    private int $payload;
    /**
     * Field content_source
     * @var object
     */
    private object $contentSource;
    /**
     * Field dont_parse_links
     * @var int
     */
    private int $dontParseLinks = 1;
    /**
     * Field disable_mentions
     * @var int
     */
    private int $disableMentions = 1;
    /**
     * Field intent
     * @var string
     */
    private string $intent = 'default';
    /**
     * Field subscribe_id
     * @var int
     */
    private int $subscribeId;
    /**
     * @var KeyboardBuilder
     */
    private KeyboardBuilder $keyboardBuilderInterface;

    /**
     * @throws \Exception
     */
    public function send(): string
    {
        return parent::call(self::METHOD_SEND, $this->toArray());
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->userId ?? '',
            'random_id' => $this->randomId ?? '',
            'peer_id' => $this->peerId ?? '',
            'peer_ids' => $this->peerIds ?? '',
            'domain' => $this->domain ?? '',
            'chat_id' => $this->chatId ?? '',
            'message' => $this->message ?? '',
            'lat' => $this->lat ?? '',
            'long' => $this->long ?? '',
            'attachment' => $this->attachment ?? '',
            'reply_to' => $this->replyTo ?? '',
            'forward_messages' => $this->forwardMessages ?? '',
            'forward' => $this->forward->toArray() ?? '',
            'sticker_id' => $this->stickerId ?? '',
            'group_id' => $this->groupId ?? '',
            'keyboard' => $this->keyboard->toArray() ?? '',
            'template' => $this->template->toArray() ?? '',
            'payload' => $this->payload ?? '',
            'content_source' => $this->contentSource->toArray() ?? '',
            'dont_parse_links' => $this->dontParseLinks ?? '',
            'disable_mentions' => $this->disableMentions ?? '',
            'intent' => $this->intent ?? '',
            'subscribe_id' => $this->subscribeId ?? '',
        ];
    }

    /**
     * @return KeyboardBuilder
     */
    public function getKeyboardBuilder(): KeyboardBuilder
    {
        return new KeyboardBuilder($this->keyboard);
    }
}
