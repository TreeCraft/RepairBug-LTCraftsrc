<?php

/*
 *
 *  _____   _____   __   _   _   _____  __    __  _____
 * /  ___| | ____| |  \ | | | | /  ___/ \ \  / / /  ___/
 * | |     | |__   |   \| | | | | |___   \ \/ /  | |___
 * | |  _  |  __|  | |\   | | | \___  \   \  /   \___  \
 * | |_| | | |___  | | \  | | |  ___| |   / /     ___| |
 * \_____/ |_____| |_|  \_| |_| /_____/  /_/     /_____/
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author iTX Technologies
 * @link https://itxtech.org
 *
 */

namespace pocketmine\block;

use LTItem\Mana\Mana;
use pocketmine\item\Item;

class UnpoweredRepeater extends PoweredRepeater {
	protected $id = self::UNPOWERED_REPEATER_BLOCK;

	/**
	 * @return string
	 */
	public function getName() : string{
		return '无能量中继器';
	}

	/**
	 * @return int
	 */
	public function getStrength(){
		return 0;
	}

	/**
	 * @param Block|null $from
	 *
	 * @return bool
	 */
	public function isActivated(Block $from = null){
		return false;
	}

	/**
	 * @param Item $item
	 *
	 * @return mixed|void
	 */
	public function onBreak(Item $item){
        if ($item instanceof Mana){
            $this->getLevel()->setBlock($this, new Air(), false, false);
        }else{
            $this->getLevel()->setBlock($this, new Air(), true, true);
        }
	}
}