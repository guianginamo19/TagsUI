<?php

namespace Guin\tagsui;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {

	public function onEnable(){
		@mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
		$this->getResource("config.yml");
	}
	public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {

		switch($cmd->getName()){
			case "tagsui":
			 if($sender instanceof Player){
			 	$this->tags($sender);
			 }
		}
	return true;
	}

	public function tags($player){
		$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");
		$form = $api->createSimpleForm(function (Player $player, int $data = null){
			if($data === null){
				return true;
			}
			switch($data){
				case 0:
					if($player->hasPermission("tags.one")){
						$player->setDisplayName($player->getName() . " " . $this->getConfig()->get("tag-1-format"));
						$player->sendMessage($this->getConfig()->get("tags-1-applied"));
					} else {
						$player->sendMessage($this->getConfig()->get("tags1-no-perm"));
					}
				break;

				case 1:
					if($player->hasPermission("tags.two")){
						$player->setDisplayName($player->getName() . " " . $this->getConfig()->get("tag-2-format"));
						$player->sendMessage($this->getConfig()->get("tags-2-applied"));
					} else {
						$player->sendMessage($this->getConfig()->get("tags2-no-perm"));
					}
				break;

				case 2:
					if($player->hasPermission("tags.three")){
						$player->setDisplayName($player->getName() . " " . $this->getConfig()->get("tag-3-format"));
						$player->sendMessage($this->getConfig()->get("tags-3-applied"));
					} else {
						$player->sendMessage($this->getConfig()->get("tags3-no-perm"));
					}
				break;

				case 3:
					if($player->hasPermission("tags.four")){
						$player->setDisplayName($player->getName() . " " . $this->getConfig()->get("tag-4-format"));
						$player->sendMessage($this->getConfig()->get("tags-4-applied"));
					} else {
						$player->sendMessage($this->getConfig()->get("tags4-no-perm"));
					}
				break;

				case 4:
					if($player->hasPermission("tags.five")){
						$player->setDisplayName($player->getName() . " " . $this->getConfig()->get("tag-5-format"));
						$player->sendMessage($this->getConfig()->get("tags-5-applied"));
					} else {
						$player->sendMessage($this->getConfig()->get("tags5-no-perm"));
					}
				break;

				case 5:
					if($player->hasPermission("tags.six")){
						$player->setDisplayName($player->getName() . " " . $this->getConfig()->get("tag-6-format"));
						$player->sendMessage($this->getConfig()->get("tags-6-applied"));
					} else {
						$player->sendMessage($this->getConfig()->get("tags6-no-perm"));
					}
				break;

				case 6:
					if($player->hasPermission("tags.seven")){
						$player->setDisplayName($player->getName() . " " . $this->getConfig()->get("tag-7-format"));
						$player->sendMessage($this->getConfig()->get("tags-7-applied"));
					} else {
						$player->sendMessage($this->getConfig()->get("tags7-no-perm"));
					}
				break;

				case 7:
					if($player->hasPermission("tags.eight")){
						$player->setDisplayName($player->getName() . " " . $this->getConfig()->get("tag-8-format"));
						$player->sendMessage($this->getConfig()->get("tags-8-applied"));
					} else {
						$player->sendMessage($this->getConfig()->get("tags8-no-perm"));
					}
				break;

				case 8:
					if($player->hasPermission("tags.nine")){
						$player->setDisplayName($player->getName() . " " . $this->getConfig()->get("tag-9-format"));
						$player->sendMessage($this->getConfig()->get("tags-9-applied"));
					} else {
						$player->sendMessage($this->getConfig()->get("tags9-no-perm"));
					}
				break;

				case 9:
					if($player->hasPermission("tags.ten")){
						$player->setDisplayName($player->getName() . " " . $this->getConfig()->get("tag-10-format"));
						$player->sendMessage($this->getConfig()->get("tags-10-applied"));
					} else {
						$player->sendMessage($this->getConfig()->get("tags10-no-perm"));
					}
				break;
			}
		});
		$form->setTitle($this->getConfig()->get("form-title"));
		$form->setContent($this->getConfig()->get("form-content"));
		$form->addButton($this->getConfig()->get("tag-1"));
		$form->addButton($this->getConfig()->get("tag-2"));
		$form->addButton($this->getConfig()->get("tag-3"));
		$form->addButton($this->getConfig()->get("tag-4"));
		$form->addButton($this->getConfig()->get("tag-5"));
		$form->addButton($this->getConfig()->get("tag-6"));
		$form->addButton($this->getConfig()->get("tag-7"));
		$form->addButton($this->getConfig()->get("tag-8"));
		$form->addButton($this->getConfig()->get("tag-9"));
		$form->addButton($this->getConfig()->get("tag-10"));
		$form->sendToPlayer($player);
		return $form;
	}

}
