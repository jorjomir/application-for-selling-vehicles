<?php

namespace App\Security;

use App\Repository\UserRepository;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\AccessToken\AccessTokenHandlerInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;

class ApiTokenHandler implements AccessTokenHandlerInterface
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserBadgeFrom(#[\SensitiveParameter] string $accessToken): UserBadge
    {
        try {
            $decoded = JWT::decode($accessToken, new Key($_ENV['JWT_SECRET'], 'HS256'));
        } catch (\Exception $e) {
            throw new CustomUserMessageAuthenticationException('Invalid token provided.');
        }

        if (!$decoded) {
            throw new CustomUserMessageAuthenticationException('Invalid token provided.');
        }

        if(!isset($decoded->expires_at) || $decoded->expires_at < time()) {
            throw new CustomUserMessageAuthenticationException('Token expired!');
        }

        return new UserBadge($decoded->email);
    }
}