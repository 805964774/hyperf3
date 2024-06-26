<?php

namespace Zsgogo\utils;
use Hyperf\Nsq;

class NsqUtil {

    /**
     * @var Nsq\Nsq|mixed
     */
    private mixed $nsq;

    public function __construct() {
        $this->nsq = \Hyperf\Support\make(Nsq\Nsq::class);
        return $this->nsq;
    }


    public function publish(string $topic,string $type,array $nsqData): void {
        $nsqData["type"] = $type;
        $this->nsq->publish($topic, json_encode($nsqData));
    }


    public function publishMany(string $topic,array $nsqData,float $ttl = 0.0): void {
        $this->nsq->publish($topic, $nsqData,$ttl);
    }
}