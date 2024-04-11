<?php
namespace App\Service;

use App\Entity\User;
use App\Enum\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService
{
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }

    public function register(array $userData): User
    {
        $user = new User();
        $user->setEmail($userData['email']);
        $user->setPassword($this->passwordHasher->hashPassword($user, $userData['password']));
        $user->setFirstName($userData['firstName']);
        $user->setLastName($userData['lastName']);
        $user->setCompanyName($userData['companyName'] ?? null);
        $user->setPhone($userData['phone']);
        $user->setUserType(UserType::from($userData['userType']));

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}
