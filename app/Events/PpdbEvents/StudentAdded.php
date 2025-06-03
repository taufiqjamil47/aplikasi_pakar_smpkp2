<?php

namespace App\Events\PpdbEvents;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StudentAdded implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $nama_siswa;
    public $name;
    /**
     * Create a new event instance.
     */
    public function __construct($nama_siswa, $name)
    {
        $this->nama_siswa = $nama_siswa;
        $this->name = $name;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('popup-channel'),
        ];
    }

    /**
     * 
     * Broadcast event Student Added
     */
    public function broadcastAs()
    {
        return 'data-baru';
    }
}
