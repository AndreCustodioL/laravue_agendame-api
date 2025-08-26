<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\InvalidEmailVerifyTokenException;
use App\Exceptions\UserAlreadyVerifiedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\VerifyEmailRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class VerifyEmailController extends Controller
{
    public function __invoke(VerifyEmailRequest $request): UserResource
    {
        $input = $request->validated();

        $user = User::whereToken($input['token'])->first();

        if (!$user) {
            throw new InvalidEmailVerifyTokenException();
        }

        if ($user->email_verified_at) {
            throw new UserAlreadyVerifiedException();
        }

        $user->update([
            'email_verified_at' => now(),
        ]);

        return new UserResource($user);
    }
}
