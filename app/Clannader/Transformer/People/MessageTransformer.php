<?php

namespace App\Clannader\Transformer\People;

use App\Clannader\Models\Relation\Message;
use League\Fractal\TransformerAbstract;
use App\Clannader\Presenter\MessagePresenter;

class MessageTransformer extends TransformerAbstract
{
    public function transform(Message $message)
    {
        return [
            'id' => $message->id,
            'uName' => $message->attack->name,
            'uHome' => $message->attack->zone,
            'about_id' => $message->about_id,
            'from_id' => $message->from_id,
            'about_type' => MessagePresenter::formatClass($message->about_type),
            'from_type' => MessagePresenter::formatClass($message->from_type),
            'content' => $message->from_id ? $message->from->name : $message->about->name,
            'method' => '回复了',
            'read' => $message->read
        ];
    }
}