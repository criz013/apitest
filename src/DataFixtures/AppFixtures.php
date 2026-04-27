<?php

namespace App\DataFixtures;

use App\Entity\Faction;
use App\Entity\FactionVersion;
use App\Entity\Game;
use App\Entity\GameVersion;
use App\Entity\Publisher;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {

            $publisher = new Publisher();
            $publisher->setName("Publisher " . $i);
            $publisher->setSlug("Publisher-slug-" . $i);
            $publisher->setDescription("Publisher description " . $i);
            $publisher->setWebsite("www.google.fr");
            $manager->persist($publisher);

            $game = new Game();
            $game->setName("Game " . $i);
            $game->setSlug("Game-slug-" . $i);
            $game->setDescription("Game description " . $i);
            $game->setPublisher($publisher);
            $manager->persist($game);

            $gameVersion = new GameVersion();
            $gameVersion->setGame($game);
            $gameVersion->setSlug("Game-version-slug-" . $i);
            $gameVersion->setName("Game version name" . $i);
            $manager->persist($gameVersion);

            for ($j = 0; $j < 10; $j++) {
                $faction = new Faction();
                $factionVersion = new FactionVersion();
                $faction->setName("Faction name " . $j);
                $faction->setSlug("faction-slug-" . $j);
                $faction->setDescription("Faction description " . $j);
                $faction->setGame($game);
                $manager->persist($faction);
                $factionVersion->setGameVersion($gameVersion);
                $factionVersion->setFaction($faction);
                $factionVersion->setSlug("faction-version-slug-" . $j);
                $manager->persist($factionVersion);
            }

            $manager->flush();
        }
    }
}
