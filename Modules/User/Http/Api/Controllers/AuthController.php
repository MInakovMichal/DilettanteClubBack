<?php
/**
 * Created by PhpStorm.
 * User: Wiktor Wojtowicz
 * Date: 21.08.2019
 * Time: 15:55
 */

namespace Modules\User\Http\Api\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Modules\Common\Http\Api\Controllers\BaseController;
use Modules\User\Http\Api\Services\AuthService;
use Modules\User\Http\Requests\LoginRequest;
use Modules\User\Http\Requests\RegisterRequest;
use Modules\User\Transformers\UserResource;
use Throwable;

/**
 * @group Authentication
 */
class AuthController extends BaseController
{
    /**
     * @var AuthService
     */
    protected $registerService;


    public function __construct(AuthService $registerService)
    {
        $this->registerService = $registerService;
    }

    /**
     * @throws Throwable
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = $this->registerService->register($request->all());

        $success['user'] = (new UserResource($user))->toArray($request);

        return $this->sendResponse('User register successfully.', $success);
    }

    /**
     * @throws Throwable
     */
    public function login(LoginRequest $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->user();
            $userToken = $user->createToken($request->device_name)->plainTextToken;

            $success['token'] = $userToken;
            $success['user'] = (new UserResource($user))->toArray($request);

            return $this->sendResponse('User login successfully.', $success);
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return $this->sendResponse('Logout.');
    }
}
