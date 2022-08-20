<?php

namespace Codezx\command;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Codezx\Loader;
use pocketmine\utils\TextFormat;

class AutoFeedCommand extends Command {
    
    public function __construct()
    {
        parent::__construct("autofeed", "Fill your food bar automatically", null, []);
    }

    public function execute(CommandSender $player, string $commandLabel, array $args)
    {
        if($player instanceof Player){
            if($player->hasPermission("autofeed.cmd")){
                return false;
            }
            #AutoFeed Code Created By iKurth
            if (!in_array ($player->getName(), Loader::getInstance()->autofeed)) {
                Loader::getInstance()->autofeed[] = $player->getName();
                
                $player->sendTitle(TextFormat::colorize(Loader::getInstance()->getConfig()->get("autofeed-Active-Title")));
                $player->sendMessage(TextFormat::colorize(Loader::getInstance()->getConfig()->get("prefix").Loader::getInstance()->getConfig()->get("autofeed-Active-Message")));
    
            } else {
    
                if (in_array($player->getName(), Loader::getInstance()->autofeed)) {
                    unset(Loader::getInstance()->autofeed[array_search($player->getName(), Loader::getInstance()->autofeed)]);
                    $player->sendTitle(TextFormat::colorize(Loader::getInstance()->getConfig()->get("autofeed-Desactive-Title")));
                    $player->sendMessage(TextFormat::colorize(Loader::getInstance()->getConfig()->get("prefix").Loader::getInstance()->getConfig()->get("autofeed-Desactive-Message")));
                }
            }
        }else{

        }
    }
}