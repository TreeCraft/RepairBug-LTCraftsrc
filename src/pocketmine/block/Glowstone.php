<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____  
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \ 
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/ 
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_| 
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 * 
 *
*/

namespace pocketmine\block;

use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\Item;
use pocketmine\item\Tool;

class Glowstone extends Transparent implements SolidLight {

	protected $id = self::GLOWSTONE_BLOCK;

	/**
	 * Glowstone constructor.
	 */
	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	/**
	 * @return string
	 */
	public function getName() : string{
		return '红石';
	}

	/**
	 * @return float
	 */
	public function getHardness(){
		return 0.3;
	}

	/**
	 * @return int
	 */
	public function getToolType(){
		return Tool::TYPE_PICKAXE;
	}

	/**
	 * @return int
	 */
	public function getLightLevel(){
		return 15;
	}

	/**
	 * @param Item $item
	 *
	 * @return array
	 */
	public function getDrops(Item $item) : array{
		if($item->getEnchantmentLevel(Enchantment::TYPE_MINING_SILK_TOUCH) > 0){
			return [
				[Item::GLOWSTONE_BLOCK, 0, 1],
			];
		}else{
			$fortuneL = $item->getEnchantmentLevel(Enchantment::TYPE_MINING_FORTUNE);
			$fortuneL = $fortuneL > 10 ? 10 : $fortuneL;
			$times = [1, 1, 2, 3, 4];
			$time = $times[mt_rand(0, $fortuneL + 1)];
			$num = mt_rand(2, 4) * $time;
			$num = $num > 4 ? 4 : $num;
			return [
				[Item::GLOWSTONE_DUST, 0, $num],
			];
		}
	}
}
