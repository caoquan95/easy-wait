<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/18/18
 * Time: 4:13 PM
 */

namespace App\Repositories;


interface QueueRepositoryInterface
{
    public function getQueues($search, $status);

    public function findQueuesByCustomerId($id);

    public function increment($queueId, $column);

    public function decrement($queueId, $column);

}