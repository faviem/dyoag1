<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\User\Professional;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use libphonenumber\PhoneNumberUtil;

class FixturesUserProfessional extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

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
        $phone = '+22998855035';
        $phoneNumber = $this->container->get('libphonenumber.phone_number_util')->parse($phone, PhoneNumberUtil::UNKNOWN_REGION);
        $userProfessional1->setPhone($phoneNumber);
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
