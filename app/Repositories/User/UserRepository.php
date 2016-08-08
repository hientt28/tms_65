<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Models\User;
use Auth;

class UserRepository extends BaseRepository
{
    
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
