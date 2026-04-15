<?php

namespace App\DataFixtures;

use App\Entity\Army;
use App\Entity\Games;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) {
            $game = new Games();
            $game->setName("Game " . $i);
            $game->setEditor("Editeur ".$i);
            $game->setVersion("Version ".$i);
            $manager->persist($game);

            $army = new Army();
            $army->setName("Army ".$i);
            $army->setSlug("Army-".$i);
            $army->addGame($game);
            $manager->persist($army);

            $manager->flush();
        }
    }
}
