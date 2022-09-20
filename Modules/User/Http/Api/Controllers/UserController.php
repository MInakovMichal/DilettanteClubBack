<?php

namespace Modules\User\Http\Api\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Transformers\UserResource;

class UserController extends Controller
{
    public function getUser(Request $request, User $user)
    {
        return response()->json(['user' => (new UserResource($user))->toArray($request)]);
    }
}
