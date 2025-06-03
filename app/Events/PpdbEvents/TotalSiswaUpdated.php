<?php

namespace App\Events\PpdbEvents;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TotalSiswaUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $totalSiswa;
    public function __construct($totalSiswa)
    {
        $this->totalSiswa = $totalSiswa;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('student-updates'),
        ];
    }
}
