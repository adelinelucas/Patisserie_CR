<?php

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command
{
    private $entityManagerInterface;
    private $encoder;
    protected static $defaultName = 'app:create-user';


    public function __construct(
        EntityManagerInterface $entityManagerInterface,
        UserPasswordEncoderInterface $encoder
    ) {
        $this->entityManagerInterface = $entityManagerInterface;
        $this->encoder = $encoder;
        parent::__construct();
    }

    protected function configure():void
    {
        $this->addArgument('username', InputArgument::REQUIRED, 'The usersname of user.')
            ->addArgument('password', InputArgument::REQUIRED, 'The password of user.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $user = new User();

        $user->setEmail($input->getArgument('username'));

        $password = $this->encoder->encodePassword($user, $input->getArgument('password'));
        $user->setPassword($password);

        $user->setRoles(['ROLE_PATISSIER'])
            ->setPrenom('')
            ->setNom('')
            ->setTelephone('');

        $this->entityManagerInterface->persist($user);
        $this->entityManagerInterface->flush();

        return Command::SUCCESS;
    }
}
