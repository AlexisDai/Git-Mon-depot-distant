<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Produit;
use App\Entity\SousCategorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $cat1 = new Categorie();
        $cat1->setNom("Guitares & Basses");
        $cat1->setImage("cat1.webp");
        $manager->persist($cat1);
        
        $cat11 = new SousCategorie();
        $cat11->setNom("Guitares Electriques");
        $cat11->setImage("cat11.webp");
        $cat11->setCategorie($cat1);
        $manager->persist($cat11);

        $pro111 = new Produit();
        $pro111->setNom("Fender AM Perf Tele RW HBST");
        $pro111->setDescription("
            Corps en aulne
            Manche en érable
            Profil du manche: Modern 'C'
            Touche en palissandre
            22 frettes Jumbo
            Largeur au sillet: 42 mm (1,65'')
            Diapason: 648 mm (25,5'')
            2 micros simple bobinage Yosemite Telecaster
            1 réglage de volume
            Circuit de tonalité Greasebucket
            Cordes Fender NPS 009-042
            Couleur: Honey Burst
            Livrée en housse Deluxe
            Fabriquée aux USA
        ");
        $pro111->setPrix(1199);
        $pro111->setImage("pro111.jpg");
        $pro111->setSousCategorie($cat11);
        $manager->persist($pro111);

        $pro112 = new Produit();
        $pro112->setNom("Gibson Les Paul Standard 50s GT");
        $pro112->setDescription("
            Corps en acajou
            Table en érable
            Manche en acajou
            Touche en palissandre
            Repères trapézoïdes
            Profil du manche: Vintage 50s
            Filets de corps et de touche couleur crème
            Sillet Graph Tech
            Largeur au sillet: 43 mm
            Diapason: 628 mm
            22 frettes Medium traitées à froid
            1 micro double bobinage Burstbucker #1 (manche)
            1 micro double bobinage Burstbucker #2 (chevalet)
            2 réglages de volume
            2 réglages de tonalité
            Condensateur Orange Drop
            Chevalet Tune-o-matic en aluminium
            Cordier Stop Bar en aluminium
            Couleur: Gold Top
            Livrée en étui
            Fabriquée aux USA
        ");
        $pro112->setPrix(2290);
        $pro112->setImage("pro112.jpg");
        $pro112->setSousCategorie($cat11);
        $manager->persist($pro112);

        $pro113 = new Produit();
        $pro113->setNom("Fender 56 Strat NOS FR GH");
        $pro113->setDescription("
            Custom Shop
            Corps léger en frêne
            Manche en érable moucheté AA teinté
            Touche en érable
            Profil du manche: 10/56 'V'
            Rayon de la touche: 241 mm
            21 frettes Medium Jumbo
            Sillet en os
            3 micros simple bobinage Fat 50's
            Câblage moderne Strat
            Mécaniques Vintage
            Pickguard 1 pli 'coquille d'œuf blanc'
            Vibrato US Vintage
            Accastillage doré
            Finition: NOS - New Old Stock
            Couleur: Fiesta Red
            Etui en tweed, câble et certificat d'authenticité incl.
        ");
        $pro113->setPrix(3799);
        $pro113->setImage("pro113.jpg");
        $pro113->setSousCategorie($cat11);
        $manager->persist($pro113);

        $pro114 = new Produit();
        $pro114->setNom("Gibson 1958 Mahogany Flying V VOS");
        $pro114->setDescription("
            Custom Shop
            Body: Mahogany
            Neck: Mahogany
            Fretboard: Rosewood
            Neck profile: Authentic chunky 'C'
            12' Radius
            Frets: 22 Authentic medium-jumbo
            Scale: 628 mm
            Fretboard inlays: Pearloid dots
            Pickups: 2 Custombucker alnico III (unpotted)
            Controls: 2 Volume, 1 Tone
            Bridge: ABR-1 with brass saddle and Chevron tailpiece
            Machine heads: Kluson tulips
            Hardware: Gold
            Finish: Walnut
            Includes a case and certificate
            Made in the USA
        ");
        $pro114->setPrix(4990);
        $pro114->setImage("pro114.jpg");
        $pro114->setSousCategorie($cat11);
        $manager->persist($pro114);

        $cat12 = new SousCategorie();
        $cat12->setNom("Gui­tares Clas­siques");
        $cat12->setImage("cat12.webp");
        $cat12->setCategorie($cat1);
        $manager->persist($cat12);

        $cat13 = new SousCategorie();
        $cat13->setNom("Basses Elec­triques");
        $cat13->setImage("cat13.webp");
        $cat13->setCategorie($cat1);
        $manager->persist($cat13);

        $cat14 = new SousCategorie();
        $cat14->setNom("Am­pli­fi­ca­teurs Gui­tares");
        $cat14->setImage("cat14.webp");
        $cat14->setCategorie($cat1);
        $manager->persist($cat14);

        $cat15 = new SousCategorie();
        $cat15->setNom("Am­pli­fi­ca­teurs Basses");
        $cat15->setImage("cat15.webp");
        $cat15->setCategorie($cat1);
        $manager->persist($cat15);


        $cat2 = new Categorie();
        $cat2->setNom(" Bat­te­ries & Per­cus­sions");
        $cat2->setImage("cat2.webp");
        $manager->persist($cat2);

        $cat3 = new Categorie();
        $cat3->setNom(" Stu­dio & En­re­gis­tre­ment");
        $cat3->setImage("cat3.webp");
        $manager->persist($cat3);

        $cat4 = new Categorie();
        $cat4->setNom(" So­no­ri­sa­tion");
        $cat4->setImage("cat4.webp");
        $manager->persist($cat4);

        

        $manager->flush();
    }
}
