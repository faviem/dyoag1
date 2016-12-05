<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\User\Particular;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use libphonenumber\PhoneNumberUtil;

class FixturesUserParticular extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $em) {
        //  Create admin user1
        $useruserParticular1 = new Particular();
        $useruserParticular1->setUsername('customer1');
        $useruserParticular1->setEnabled(true);
        $useruserParticular1->setEmail('custom1@gmail.com');
        $useruserParticular1->setPlainPassword('test');
        $useruserParticular1->setRoles(array('ROLE_PARTICULAR'));
        $useruserParticular1->setFirstName('Gisèle');
        $useruserParticular1->setLastName('Agassounon');
        $phone = '+22996610110';
        $phoneNumber = $this->container->get('libphonenumber.phone_number_util')->parse($phone, PhoneNumberUtil::UNKNOWN_REGION);
        $useruserParticular1->setPhone($phoneNumber);
        $useruserParticular1->setProfil('Particulier');
        $useruserParticular1->setUserCategory($this->getReference('userCategory2'));
        $useruserParticular1->addField($this->getReference('field2'));
        $useruserParticular1->addField($this->getReference('field3'));
        $em->persist($useruserParticular1);
        $em->flush();
        $this->addReference('useruserParticular1', $useruserParticular1);
    }

    public function getOrder() {
        return 4; // the order in which fixtures will be loaded
    }

}
