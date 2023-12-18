<?php

namespace App\Bicycle;

class Bicycle
{
    private $isRunning = false;

    public function start()
    {
        $this->isRunning = true;
        return 'The bicycle is now running.';
    }

    public function stop()
    {
        $this->isRunning = false;
        return 'The bicycle has stopped.';
    }

    public function isRunning()
    {
        return $this->isRunning;
    }
}