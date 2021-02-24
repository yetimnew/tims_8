<?php

namespace App\Events;

use App\Models\Operation\Operation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use PHPUnit\Framework\Constraint\Operator;

class OperationCreatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
public   $operation;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Operation $operation)
    {
        $this->operation = $operation;
        // dd( $operation->id);
    }

    public function broadcastOn()
    {
        return new PrivateChannel('operation.'.$this->operation->id);
    }
    public function broadcastWith(){
        return [
            'operationid'=>$this->operation->operationid,
            'created_by'=>$this->operation->user->name,
            'created_at'=>$this->operation->created_at->diffForHumans()
        ];
        # code...
    }
}
