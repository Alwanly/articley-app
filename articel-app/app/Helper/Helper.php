<?php

namespace App\Helper;

use App\Models\Roles;
use Illuminate\Support\Facades\Auth;

class Helper
{
    public static function getPermission(...$permission)
    {
        $role = Roles::select('role')->find(Auth::user()->role_id)->role;

        foreach ($permission as $p) {
            if ($p === $role) return true;
        }
        return false;
    }
}
