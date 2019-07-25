<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalPrice = 0;
	public $totalQty = 0;

	public function __construct($oldCart)
	{
		if($oldCart)
		{
			$this->items 	  = $oldCart->items;
			$this->totalQty   = $oldCart->totalQty;	
			$this->totalPrice = $oldCart->totalPrice;
		}
	}

	public function add($item, $id)
	{
		
		$storeItem = ['qty' => 0, 'price' => $item->unit_sp, 'item' => $item];
		if ($this->items) {
			if (array_key_exists($id, $this->items)) {
				$storeItem = $this->items[$id];
			}
		}
		$storeItem['qty']++;
		$storeItem['price'] = $item->unit_sp * $storeItem['qty'];
		$this->items[$id] = $storeItem;
		$this->totalQty++;
		$this->totalPrice += $item->unit_sp;
	}
}
