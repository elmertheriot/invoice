<?php

declare(strict_types=1);

namespace WebChemistry\Invoice\Data;

class Company extends Subject {

	/** @var bool */
	protected $hasTax;

	/**
	 * @param string $name
	 * @param string $town
	 * @param string $address
	 * @param string $zip
	 * @param string $country
	 * @param string|null $tin
	 * @param string|null $vaTin
	 * @param bool $hasTax
	 */
	public function __construct(string $name, string $town, string $address, string $zip, string $country, ?string $tin = null, ?string $vaTin = null,
								bool $hasTax = false) {
		parent::__construct($name, $town, $address, $zip, $country, $tin, $vaTin);
		$this->hasTax = $hasTax;
	}

	/**
	 * @return bool
	 */
	public function hasTax(): bool {
		return $this->hasTax;
	}

}
