<?php

namespace Codezx\command;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase as Loader;

class AutoFeedCommand extends Command {

    private $plugin;
    
    public function __construct(Loader $plugin)
    {
        parent::__construct("autofeed", "Fill your food bar automatically", null, []);
        $this->api = $plugin;
    }

    public function execute(CommandSender $player, string $commandLabel, array $args)
    {
        if($player instanceof Player){
            
        }else{

        }
    }
}