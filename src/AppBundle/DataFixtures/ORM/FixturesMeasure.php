<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Measure;

class FixturesMeasure extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $em) {

        $measure1 = new Measure();
        $measure1->setName('Kg');
        $em->persist($measure1);

        $measure2 = new Measure();
        $measure2->setName('L');
        $em->persist($measure2);

        $measure3 = new Measure();
        $measure3->setName('Sac');
        $em->persist($measure3);

        $measure4 = new Measure();
        $measure4->setName('Adjandjan');
        $em->persist($measure4);

        $measure5 = new Measure();
        $measure5->setName('Carton');
        $em->persist($measure5);

        $measure6 = new Measure();
        $measure6->setName('Quarantaine');
        $em->persist($measure6);

        $em->flush();
        $this->addReference('measure1', $measure1);
        $this->addReference('measure2', $measure2);
        $this->addReference('measure3', $measure3);
        $this->addReference('measure4', $measure4);
        $this->addReference('measure5', $measure5);
        $this->addReference('measure6', $measure6);
    }

    public function getOrder() {
        return 7; // the order in which fixtures will be loaded
    }

}
