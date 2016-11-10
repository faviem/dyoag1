<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\User\UserCategory;

class FixturesUserCategory extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $em) {

        $userCategory1 = new UserCategory();
        $userCategory1->setName('Producteur');
        $em->persist($userCategory1);

        $userCategory2 = new UserCategory();
        $userCategory2->setName('Transformateur');
        $em->persist($userCategory2);

        $userCategory3 = new UserCategory();
        $userCategory3->setName('Commerçant');
        $em->persist($userCategory3);

//        $userCategory4 = new UserCategory();
//        $userCategory4->setName('Détaillant');
//        $em->persist($userCategory4);
//
//        $userCategory5 = new UserCategory();
//        $userCategory5->setName('Autres');
//        $em->persist($userCategory5);

        $em->flush();
        $this->addReference('userCategory1', $userCategory1);
        $this->addReference('userCategory2', $userCategory2);
        $this->addReference('userCategory3', $userCategory3);
//        $this->addReference('userCategory4', $userCategory4);
//        $this->addReference('userCategory5', $userCategory5);
    }

    public function getOrder() {
        return 1; // the order in which fixtures will be loaded
    }

}
