<?php

namespace Codezx\command;

use pocketmine\player\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use Codezx\Loader;
use pocketmine\utils\TextFormat;

class FeedCommand extends Command {

    public function __construct()
    {
        parent::__construct("feed", "Refill You Food Bar", null, []);
    }

    public function execute(CommandSender $player, string $commandLabel, array $args)
    {
        if($player instanceof Player){
            $hunger = $player->getHungerManager();
            $hunger->setFood($player->getMaxHealth());
            $message = Loader::getInstance()->getConfig()->get("feed-message");
            $prefix = Loader::getInstance()->getConfig()->get("prefix");
            $player->sendMessage(TextFormat::colorize($prefix.$message));
        }else{

        }
    }
}