<?php


Route::prefix("queue")->middleware("auth.jwt")->group(function () {
    Route::get("/", "QueueApiController@getQueues");
    Route::get("/user/{userId}", "QueueApiController@getQueuesByCustomerId");
    Route::get("/{id}", "QueueApiController@getQueue");
    Route::post("/", "QueueApiController@createQueue");
    Route::put("/{id}", "QueueApiController@updateQueue");
    Route::delete("/{id}", "QueueApiController@deleteQueue");

    Route::post("/{queueId}/user", "QueueApiController@register");
    Route::delete("/{queueId}/user", "QueueApiController@unregister");
});

