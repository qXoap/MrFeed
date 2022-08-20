<?php

namespace Codezx;

use Codezx\command\AutoFeedCommand;
use Codezx\command\FeedCommand;
use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\ClosureTask;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{

    public $autofeed = [];

    public static $instance;

    public function onEnable(): void{
        self::$instance = $this;
        Server::getInstance()->getCommandMap()->register("feed", new FeedCommand());
        Server::getInstance()->getCommandMap()->register("autofeed", new AutoFeedCommand());
        $this->saveDefaultConfig();
        #AutoFeed Code Created By iKurth
        $task = $this->getScheduler();
        $task->scheduleRepeatingTask(new ClosureTask(function () : void {
            foreach ($this->getServer()->getOnlinePlayers() as $players) {
                if (in_array ($players->getName(), $this->autofeed)) {
                    $players->getHungerManager()->setFood(20);
                    $players->getHungerManager()->setSaturation(20);
                }
            }
        }), 0 * 20);
    }

    public static function getInstance(): Loader {
        return self::$instance;
    }
}