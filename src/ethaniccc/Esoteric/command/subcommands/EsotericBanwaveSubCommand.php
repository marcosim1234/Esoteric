<?php

namespace ethaniccc\Esoteric\command\subcommands;

use CortexPE\Commando\BaseSubCommand;
use ethaniccc\Esoteric\command\subcommands\banwave\BanwaveAddSubCommand;
use ethaniccc\Esoteric\command\subcommands\banwave\BanwaveExecuteSubCommand;
use ethaniccc\Esoteric\command\subcommands\banwave\BanwaveRemoveSubCommand;
use ethaniccc\Esoteric\command\subcommands\banwave\BanwaveUndoSubCommand;
use ethaniccc\Esoteric\Esoteric;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class EsotericBanwaveSubCommand extends BaseSubCommand {

    public function onRun(CommandSender $sender, string $aliasUsed, array $args): void {
        if ($sender->hasPermission("ac.command.banwave")) {
            if (Esoteric::getInstance()->getBanwave() === null) {
                $sender->sendMessage(TextFormat::RED . "Banwaves are disabled");
                return;
            }

            $sender->sendMessage(TextFormat::RED . "Available sub commands: execute, undo, add, remove");
        } else {
            $sender->sendMessage($this->getPermissionMessage());
        }
    }

    protected function prepare(): void {
        // TODO: Descriptions
        $this->registerSubCommand(new BanwaveAddSubCommand($this->plugin, "add", "Create a new banwave in the Esoteric anti-cheat"));
        $this->registerSubCommand(new BanwaveRemoveSubCommand($this->plugin, "remove", "Create a new banwave in the Esoteric anti-cheat"));
        $this->registerSubCommand(new BanwaveUndoSubCommand($this->plugin, "undo", "Create a new banwave in the Esoteric anti-cheat"));
        $this->registerSubCommand(new BanwaveExecuteSubCommand($this->plugin, "execute", "Create a new banwave in the Esoteric anti-cheat"));
    }
}





