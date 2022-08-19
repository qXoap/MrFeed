<?php

namespace Codezx;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Loader extends PluginBase{

    public $autofeed = [];

    public function onEnabel(): void{
        $this->prefix = $this->getConfig()->get(TextFormat::colorize('prefix'));
        $this->auto = $this->getConfig()->get(TextFormat::colorize('autofeed-message'));
        $this->feed = $this->getConfig()->get(TextFormat::colorize('feed-message'));
    }
}