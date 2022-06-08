<?php

namespace im_68;

use im_68\listeners\JoinPlayer;

use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class Main extends PluginBase implements Listener
{
  use SingletonTrait;
  
  protected function onLoad(): void
    {
        self::setInstance($this);
    }
  public function onEnable(): void {
    $config = Main::getInstance()->getConfig();
    $this->getLogger()->info("Enabled Plugin");
    $this->saveResource("config.yml");
    $this->getServer()->getPluginManager()->registerEvents(new JoinPlayer($this), $this);
    $this->getServer()->getNetwork()->setName($config->get("motd-server"));
  }
  public function onDisable(): void {
    $this->getLogger()->info("Disabled Plugin"
);
   }
}