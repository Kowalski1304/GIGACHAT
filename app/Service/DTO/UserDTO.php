<?php

namespace App\Service\DTO;

use Illuminate\Support\Facades\Hash;

class UserDTO
{

    public function prepareUsersData($request)
    {
        return [
          'name'  => $request->name,
          'city'  => $request->city,
          'age'  => $request->age,
          'password'  => Hash::make($request->password),
        ];
    }
}
