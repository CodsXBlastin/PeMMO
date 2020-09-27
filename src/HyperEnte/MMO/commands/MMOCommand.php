<?php

namespace HyperEnte\MMO\commands;

use HyperEnte\MMO\MMO;
use pocketmine\command\PluginCommand;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\utils\TextFormat as C;
use pocketmine\utils\Config;

class MMOCommand extends PluginCommand{

	public function __construct(){
		parent::__construct("mmo", MMO::getMain());
		$this->setDescription("See your MMO Stats");
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){

		if(!$sender instanceof Player) return;

		$name = $sender->getName();
		$c = new Config(MMO::getMain()->getDataFolder()."/MMOStats/mmo.json", Config::JSON);
		$info = $c->get("$name");
		$mining = $info["mining"];
		$tree = $info["treecutting"];
		$combat = $info["combat"];
		$sender->sendMessage(C::GREEN . $name . "'s " . C::GOLD . "MMO Stats:\n" . C::BLUE . "Mining: " . $mining . C::GREEN . "\nForaging: " . $tree . C::RED . "\nCombat: " . $combat);

	}

}
