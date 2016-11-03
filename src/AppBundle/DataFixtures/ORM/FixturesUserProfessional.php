<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\User\Professional;

class FixturesUserProfessional extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $em) {
        //  Create admin user1
        $userProfessional1 = new Professional();
        $userProfessional1->setUsername('userfarm1');
        $userProfessional1->setEnabled(true);
        $userProfessional1->setEmail('farm1@gmail.com');
        $userProfessional1->setPlainPassword('test');
        $userProfessional1->setRoles(array('ROLE_PROFESSIONAL'));
        $userProfessional1->setFirstName('Eric');
        $userProfessional1->setLastName('Adomou');
        $userProfessional1->setPhone('97502447');
        $userProfessional1->setProfil('Professionnel');
        $userProfessional1->setNomEntreprise('Dyo agro');
        $userProfessional1->setAdresse('Cotonou');
        $userProfessional1->setIfu(1234567890123);
        $userProfessional1->setUserCategory($this->getReference('userCategory1'));
        $userProfessional1->addField($this->getReference('field1'));
        $userProfessional1->addField($this->getReference('field2'));
        $em->persist($userProfessional1);
        $em->flush();
        $this->addReference('userProfessional1', $userProfessional1);
    }

    public function getOrder() {
        return 5; // the order in which fixtures will be loaded
    }

}
