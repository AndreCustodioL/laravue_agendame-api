<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\InvalidPasswordResetTokenException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\PasswordResetToken;

class ResetPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ResetPasswordRequest $request): void
    {
        $input = $request->validated();

        $token = PasswordResetToken::whereToken($input['token'])
            ->whereDate('created_at', '>=', now()->subHours(24)->toDateTimeString())
            ->first();

        if (!$token) {
            throw new InvalidPasswordResetTokenException();
        }

        $user = $token->user;
        $user->update([
            'password' => $input['password']
        ]);

        $user->resetPasswordTokens()->delete();
    }
}
