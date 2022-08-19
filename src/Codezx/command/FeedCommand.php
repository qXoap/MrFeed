<?php

namespace Codezx\command;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase as Loader;

class FeedCommand extends Command {

    private $plugin;
    
    public function __construct(Loader $plugin)
    {
        parent::__construct("feed", "Refill You Food Bar", null, []);
        $this->api = $plugin;
    }

    public function execute(CommandSender $player, string $commandLabel, array $args)
    {
        if($player instanceof Player){
            $hunger = $player->getHungerManager();
            $hunger->setFood(20);
            $player->sendMessage($this->api->prefix.$this->api->feed);
        }else{

        }
    }
}