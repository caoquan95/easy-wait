<?php

/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/22/18
 * Time: 4:27 PM
 */

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\ApiController;
use App\Repositories\QueueRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Queue as QueueResource;

class QueueApiController extends ApiController
{
    protected $queueRepository;

    public function __construct(QueueRepositoryInterface $queueRepository)
    {
        parent::__construct();
        $this->queueRepository = $queueRepository;
    }

    // public function getQueues(Request $request)
    // {
    //     return $this->success($this->queueRepository->getQueues($request->search, $request->status));
    // }

    // public function getQueue($id)
    // {
    //     if (!$this->queueRepository->checkExist($id))
    //         return $this->badRequest("Queue doesn't exist");

    //     return $this->success($this->queueRepository->getQueue($id));
    // }

    public function createQueue(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return $this->badRequest([
                "messages" => $validator->messages()
            ]);
        }

        $queue = $this->queueRepository->create([
            "name" => $request->name,
            "status" => $request->status,
        ]);

        return $this->success("Success");
    }

    public function updateQueue($id, Request $request)
    {
        if (!$this->queueRepository->checkExist($id))
            return $this->badRequest("Queue doesn't exist");

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return $this->badRequest([
                "messages" => $validator->messages()
            ]);
        }

        $queue = $this->queueRepository->update($id, [
            "name" => $request->name,
            "status" => $request->status,
        ]);

        return $this->success("Success");
    }

    public function deleteQueue($id)
    {
        if (!$this->queueRepository->checkExist($id))
            return $this->badRequest("Queue doesn't exist");

        $this->queueRepository->delete($id);
        return $this->success("Success");
    }

}