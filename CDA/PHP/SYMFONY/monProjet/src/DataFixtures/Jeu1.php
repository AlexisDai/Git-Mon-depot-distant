<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Artist;
use App\Entity\Disc;

class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $artist1 = new Artist();

        $artist1->setName("Queens Of The Stone Age");
        $artist1->setUrl("https://qotsa.com/");
        $manager->persist($artist1);

        $artist2 = new Artist();

        $artist2->setName("Fugazi");
        $artist2->setUrl("https://fuga.com/");
        $manager->persist($artist2);
        
        $disc1 = new Disc();
        $disc1->setTitle("Songs for the Deaf");
        $disc1->setPicture("https://en.wikipedia.org/wiki/Songs_for_the_Deaf#/media/File:Queens_of_the_Stone_Age_-_Songs_for_the_Deaf.png");
        $disc1->setLabel("Interscope Records");
        $manager->persist($disc1);

        $disc2 = new Disc();
        $disc2->setTitle("Rated R");
        $disc2->setLabel("Interscope Records");
        $disc2->setPicture("rated_r.jpg");
        $manager->persist($disc2);

        $disc3 = new Disc();
        $disc3->setTitle("Era Vulgaris");
        $disc3->setLabel("Interscope Records");
        $disc3->setPicture("era_vulgaris.jpg");
        $manager->persist($disc3);

        $disc4 = new Disc();
        $disc4->setTitle("Repeater");
        $disc4->setLabel("Dischord");
        $disc4->setPicture("repeater.jpg");
        $manager->persist($disc4);

        $disc5 = new Disc();
        $disc5->setTitle("Red Medicine");
        $disc5->setLabel("Dischord");
        $disc5->setPicture("red_medicine.jpg");
        $manager->persist($disc5);

        $disc6 = new Disc();
        $disc6->setTitle("End Hits");
        $disc6->setLabel("Dischord");
        $disc6->setPicture("end_hits.jpg");
        $manager->persist($disc6);
        
        
        // Pour associer vos entités
        $disc1->setArtist($artist1);
        $disc2->setArtist($artist1);
        $disc3->setArtist($artist1);
        $disc4->setArtist($artist2);
        $disc5->setArtist($artist2);
        $disc6->setArtist($artist2);

        

        $manager->flush();
    }
}
