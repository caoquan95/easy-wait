<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/18/18
 * Time: 4:13 PM
 */

namespace App\Repositories;


interface QueueUserRepositoryInterface
{
    public function findByUserIdAndQueueId($userId, $queueId);
}