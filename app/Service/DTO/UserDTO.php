<?php

namespace App\Service\DTO;

use Illuminate\Support\Facades\Hash;

class UserDTO
{

    /**
     * @param $request
     * @return array
     */
    public function prepareUsersData($request) :array
    {
        return [
          'name'  => $request->name,
          'city'  => $request->city,
          'age'  => $request->age,
          'email' => $request->email,
          'password'  => Hash::make($request->password),
        ];
    }
}
