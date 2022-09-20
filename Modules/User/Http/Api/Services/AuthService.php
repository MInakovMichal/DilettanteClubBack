<?php

namespace Modules\User\Http\Api\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Language\Entities\Language;
use Throwable;

class AuthService
{
    /**
     * @param $data
     * @return User
     * @throws Throwable
     */
    public function register($data): User
    {
        $user = new User();

        DB::beginTransaction();

        try {

            $user->name = $data['name'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->actual_interface_language = Language::getLanguageByCode($data['language'])->id;
            $user->password = Hash::make($data['password']);

            $user->save();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return $user;
    }
}
