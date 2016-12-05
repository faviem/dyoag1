<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\User\Admin;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use libphonenumber\PhoneNumberUtil;

class FixturesUserAdmin extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $em) {
        //  Create admin user1
        $user1 = new Admin();
        $user1->setUsername('admin');
        $user1->setEnabled(true);
        $user1->setEmail('jtocson@gmail.com');
        $user1->setPlainPassword('adminpass');
        $user1->setRoles(array('ROLE_SUPER_ADMIN'));
        $user1->setFirstName('Jacques');
        $user1->setLastName('Adjahoungbo');
        $phone = '+22997502447';
        $phoneNumber = $this->container->get('libphonenumber.phone_number_util')->parse($phone, PhoneNumberUtil::UNKNOWN_REGION);
        $user1->setPhone($phoneNumber);
        $user1->setProfil('Admin');
        $user1->setUserCategory($this->getReference('userCategory1'));
        $user1->addField($this->getReference('field1'));
        $user1->addField($this->getReference('field2'));
        $em->persist($user1);
        $em->flush();
        $this->addReference('admin', $user1);
    }

    public function getOrder() {
        return 3; // the order in which fixtures will be loaded
    }

}
