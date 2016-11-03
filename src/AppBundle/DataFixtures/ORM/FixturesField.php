<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\User\Field;

class FixturesField extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $em) {

        $field1 = new Field();
        $field1->setName('Fruits et légumes');
        $em->persist($field1);

        $field2 = new Field();
        $field2->setName('Céréales');
        $em->persist($field2);

        $field3 = new Field();
        $field3->setName('Autres');
        $em->persist($field3);

        $em->flush();
        $this->addReference('field1', $field1);
        $this->addReference('field2', $field2);
        $this->addReference('field3', $field3);
    }

    public function getOrder() {
        return 2; // the order in which fixtures will be loaded
    }

}
