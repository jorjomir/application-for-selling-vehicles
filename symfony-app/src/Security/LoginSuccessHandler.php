<?php

namespace App\Security;

use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    public function onAuthenticationSuccess(Request $request, TokenInterface $token): JsonResponse
    {
        $payload = [
            'email'      => $token->getUserIdentifier(),
            'issued_at'  => time(),               // Issued at: time when the token was generated
            'expires_at' => time() + (3600 * 4),  // Expiration time set to 4 hours
            'roles'      => $token->getRoleNames()[0],
        ];

        return new JsonResponse(['token' => JWT::encode($payload, $_ENV['JWT_SECRET'], 'HS256')]);
    }
}
