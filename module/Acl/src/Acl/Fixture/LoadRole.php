<?php
namespace Acl\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Acl\Entity\Role;

class LoadRole extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $role = new Role;
        $role->setName("Visitante");
        $manager->persist($role);

        $visitante = $manager->getReference('Acl\Entity\Role',1);

        $role = new Role;
        $role->setName("Registrando");
        $role->setParent($visitante);

        $manager->persist($role);

        $registrando = $manager->getReference('Acl\Entity\Role',2);

        $role = new Role;
        $role->setName("Redator");
        $role->setParent($registrando);

        $manager->persist($role);

        $role = new Role;
        $role->setName("Admin");
        $role->setIsAdmin(true);

        $manager->persist($role);

        $manager->flush();
    }

}