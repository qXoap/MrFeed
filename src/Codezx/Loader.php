<?php

namespace Codezx;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase{

    public $autofeed = [];

    public function onEnabel(): void{
        $this->prefix = $this->getConfig()->get('prefix');
        $this->auto = $this->getConfig()->get('autofeed-message');
        $this->feed = $this->getConfig()->get('feed-message');
    }
}