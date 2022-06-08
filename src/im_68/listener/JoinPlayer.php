<?php

namespace im_68\listeners;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\Server;

use im_68\Main;

class JoinPlayer implements Listener
{
     public function onJoin(PlayerJoinEvent $event){
     $player = $event->getPlayer();
     $nick = $player->getName();
     $config = Main::getInstance()->getConfig();
     $message = str_replace("{nick}", $nick, $config->get("player-join"));
     $event->setJoinMessage($message);
     $player->sendTitle($config->get("player-title"));
  }
   public function onQuit(PlayerQuitEvent $event){
     $player = $event->getPlayer();
     $nick = $player->getName();
     $config = Main::getInstance()->getConfig();
     $message = str_replace("{nick}", $nick, $config->get("player-leave"));
     $event->setQuitMessage($message);
   }
}