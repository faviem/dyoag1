<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\File\File;

class FixturesProduct extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    /**
     * @var ContainerInterface
     */
    private $container;
    private $webRoot;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    public function load(ObjectManager $em) {

        $this->webRoot = $this->container->get('kernel')->getRootDir() . "/../web";

        $product1 = new Product();
        $product1->setName('Gari');
        $product1->addMeasure($this->getReference('measure1'));
        $product1->addMeasure($this->getReference('measure3'));
        $product1->addMeasure($this->getReference('measure4'));
        $product1->setCategory($this->getReference('category3'));
        $path1 = realpath($this->webRoot . "/uploads/fixture_images/gari.jpg");
        $imageFile1 = new File($path1);
        $product1->setImageFile($imageFile1);
        $product1->setImageName('gari');
        $em->persist($product1);

        $product2 = new Product();
        $product2->setName('Annas');
        $product2->addMeasure($this->getReference('measure6'));
        $product2->setCategory($this->getReference('category2'));
        $path2 = realpath($this->webRoot . "/uploads/fixture_images/annas.jpg");
        $imageFile2 = new File($path2);
        $product2->setImageFile($imageFile2);
        $product2->setImageName('annas');
        $em->persist($product2);

        $product3 = new Product();
        $product3->setName('Haricot vert');
        $product3->addMeasure($this->getReference('measure1'));
        $product3->addMeasure($this->getReference('measure3'));
        $product3->setCategory($this->getReference('category3'));
        $path3 = realpath($this->webRoot . "/uploads/fixture_images/haricot-vert.jpg");
        $imageFile3 = new File($path3);
        $product3->setImageFile($imageFile3);
        $product3->setImageName('haricot-vert');
        $em->persist($product3);

        $product4 = new Product();
        $product4->setName('Oignon rouge');
        $product4->addMeasure($this->getReference('measure3'));
        $product4->addMeasure($this->getReference('measure6'));
        $product4->setCategory($this->getReference('category3'));
        $path4 = realpath($this->webRoot . "/uploads/fixture_images/oignon.jpg");
        $imageFile4 = new File($path4);
        $product4->setImageFile($imageFile4);
        $product4->setImageName('oignon');
        $em->persist($product4);

        $product5 = new Product();
        $product5->setName('Pomme de terre');
        $product5->addMeasure($this->getReference('measure3'));
        $product5->addMeasure($this->getReference('measure6'));
        $product5->setCategory($this->getReference('category1'));
        $path5 = realpath($this->webRoot . "/uploads/fixture_images/pomme-de-terre.jpg");
        $imageFile5 = new File($path5);
        $product5->setImageFile($imageFile5);
        $product5->setImageName('pomme-de-terre');
        $em->persist($product5);

        $em->flush();
        $this->addReference('product1', $product1);
        $this->addReference('product2', $product2);
        $this->addReference('product3', $product3);
        $this->addReference('product4', $product4);
        $this->addReference('product5', $product5);
    }

    public function getOrder() {
        return 8; // the order in which fixtures will be loaded
    }

}
