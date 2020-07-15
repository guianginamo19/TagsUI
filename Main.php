<?php
declare(strict_types=1);

namespace Guin\tagsui;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\command\{Command,CommandSender};
use pocketmine\utils\Config;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\utils\TextFormat;

class Main extends PluginBase {
    public const PREFIX = "§l§a[Cytron§dMC]";
		
    public function onEnable() {
        $this->getLogger()->info(self::PREFIX .TextFormat::GREEN."SimpleTagsUI Enabled");
    }
    public function onDisable() {
        $this->getLogger()->info(self::PREFIX .TextFormat::RED."SimpleTagsUI Disabled");
    }

	public function runAsOp(Player $player, String $cmd){
		if ($player->isOp()) {
                    $this->getServer()->dispatchCommand($player, $cmd);
                } else {
                    $this->getServer()->addOp($player->getName());                     $this->getServer()->dispatchCommand($player, $cmd);
                    $this->getServer()->removeOp($player->getName());
                  }
              }


	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
        if ($sender instanceof Player and $command->getName() == "tags") {
            $this->tagsForm($sender);
        }
        return true;
    }




    public function tagsForm(Player $player) {
    
    	
        $form = new SimpleForm(function (Player $player, $data){
            if ($data === null) {
                return;
            }
            switch ($data) {
                case 0:

                            if (!$player->hasPermission("tags.knight")) {
                                $player->sendMessage(self::PREFIX ."This tag is locked!");
                                return true;
                            }else{
        
								$player->setDisplayName($player->getName() . "[§l§4Kni§8ght§r] ");
        
								$player->sendMessage(self::PREFIX ."Knight tag equiped!");
						}
                            return true;
                case 1:

                            if (!$player->hasPermission("tags.warrior")) {
                                $player->sendMessage(self::PREFIX ."This tag is locked!");
                                return true;
                            }else{
        
								
       
        
								$player->setDisplayName($player->getName() . " [§l§cWarrior§r]");
        
								$player->sendMessage(self::PREFIX ."Warrior tag equiped!");
                        }
                            return true;
                case 2: 

                            if (!$player->hasPermission("tags.armorer")) {
                                $player->sendMessage(self::PREFIX ."This tag is locked!");
                                return true;
                            }else{
        
								
								$player->setDisplayName($player->getName() . " [§l§7Armo§8rer§r]");
        
								$player->sendMessage(self::PREFIX ."Armorer tag equiped!");
                        }
                            return true;
                case 3:

                            if (!$player->hasPermission("tags.archer")) {
                                $player->sendMessage(self::PREFIX ."This tag is locked!");
                                return true;
                            }else{
        
								
								$player->setDisplayName($player->getName() . " [§l§aArc§2her§r]");
        
								$player->sendMessage(self::PREFIX ."Archer tag equiped!");
                        }
                            return true;
                case 4: 

                            if (!$player->hasPermission("tags.wizard")) {
                                $player->sendMessage(self::PREFIX ."This tag is locked!");
                                return true;
                            }else{
        
									
								$player->setDisplayName($player->getName() . " [§l§9Wiz§1ard§r]");
        
								$player->sendMessage(self::PREFIX ."Wizard tag equiped!");
                        }
                            return true;
                case 5:

                            if (!$player->hasPermission("tags.queen")) {
                                $player->sendMessage(self::PREFIX ."This tag is locked!");
                                return true;
                            }else{
        
								
								$player->setDisplayName($player->getName() . " [§l§dQue§5en§r]");
        
								$player->sendMessage(self::PREFIX ."Queen tag equiped!");
                        }
                            return true;
                case 6: 

                            if (!$player->hasPermission("tags.king")) {
                                $player->sendMessage(self::PREFIX ."This tag is locked!");
                                return true;
                            }else{
        
									
								$player->setDisplayName($player->getName() . " [§e§lKi§6ng§r]");
        
								$player->sendMessage(self::PREFIX ."King tag equiped!");
                        }
                            return true;
            }
            }
        );
        $form->setTitle("§b§lTags");
        $form->setContent("§7Choose Your Tag");
		
        $form->addButton($player->hasPermission("tags.knight") === true ? "[§l§4Kni§8ght§r]\n§a§lUNLOCKED" : "[§l§4Kni§8ght§r]\n§c§lLOCKED"); 
		
		$form->addButton($player->hasPermission("tags.warrior") === true ? " [§l§cWarrior§r]\n§a§lUNLOCKED" : " [§l§cWarrior§r]\n§c§lLOCKED");
		
        $form->addButton($player->hasPermission("tags.armorer") === true ? "[§l§7Armo§8rer§r]\n§r§a§lUNLOCKED" : "[§l§7Armo§8rer§r]\n§c§lLOCKED");
		
		$form->addButton($player->hasPermission("tags.archer") === true ? "[§l§aArc§2her§r]\n§r§a§lUNLOCKED" : "[§l§aArc§2her§r]\n§c§lLOCKED"); 
		
        $form->addButton($player->hasPermission("tags.wizard") === true ? " [§l§9Wiz§1ard§r]\n§r§a§lUNLOCKED" : " [§l§9Wiz§1ard§r]\n§c§lLOCKED");
		
        $form->addButton($player->hasPermission("tags.queen") === true ? "[§l§dQue§5en§r]\n§r§a§lUNLOCKED" : "[§l§dQue§5en§r]\n§c§lLOCKED");
		
        $form->addButton($player->hasPermission("tags.king") === true ? " [§e§lKi§6ng§r]\n§r§a§lUNLOCKED" : " [§e§lKi§6ng§r]\n§c§lLOCKED");
		
     
        $form->addButton("§c§lClose");
        $form->sendToPlayer($player);
    }

    
}
