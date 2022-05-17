<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Events\Dispatchable;

class UserLoginFromApi
{
    use Dispatchable;

    public $user;
    public $request;

    /**
     * Create a new event instance
     *
     * @param \App\Models\User $user
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
    }
}
