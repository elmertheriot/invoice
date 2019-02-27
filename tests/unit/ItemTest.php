<?php

class ItemTest extends \Codeception\Test\Unit {

	/** @var \WebChemistry\Invoice\Data\Item */
	private $item;

	/** @var \WebChemistry\Invoice\Calculators\ICalculator */
	private $calculator;

	protected function _before() {
		$this->item = new \WebChemistry\Invoice\Data\Item('Foo', 15, 2, 0.10);
		$this->calculator = new \WebChemistry\Invoice\Calculators\BcCalculator(2);
	}

	// tests
	public function testTotalPriceWithoutTax() {
		$this->assertSame('30.00', $this->item->getTotalPrice($this->calculator, false));
	}

	public function testTotalPriceSetFixed() {
		$this->item->setTotalPrice(40);
		$this->assertSame('40.00', $this->item->getTotalPrice($this->calculator, false));
	}

	public function testTotalPriceWithTax() {
		$this->assertSame('33.00', $this->item->getTotalPrice($this->calculator, true));
	}

	public function testTotalPriceSetFixedWithUseTax() {
		$this->item->setTotalPrice(40.99);

		$this->assertSame('40.99', $this->item->getTotalPrice($this->calculator, true));
	}

}