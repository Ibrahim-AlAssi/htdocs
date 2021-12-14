<?php

use Illuminate\Support\Facades\Auth;

function user(): \App\Models\User|null
{
    return Auth::user();
}
