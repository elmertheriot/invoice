<?php declare(strict_types = 1);

namespace WebChemistry\Invoice\Calculators;

class BcCalculator implements ICalculator {

	/** @var int */
	private $scale;

	public function __construct(int $scale = 0) {
		if (!function_exists('bcadd')) {
			throw new \RuntimeException('BC math is not installed.');
		}
		$this->scale = $scale;
	}

	/**
	 * @param string|int|float $op1
	 * @param string|int|float $op2
	 * @return string
	 */
	public function add($op1, $op2): string {
		return bcadd((string) $op1, (string) $op2, $this->scale);
	}

	/**
	 * @param string|int|float $op1
	 * @param string|int|float $op2
	 * @return string
	 */
	public function mul($op1, $op2): string {
		return bcmul((string) $op1, (string) $op2, $this->scale);
	}

	/**
	 * @param string|int|float $op1
	 * @param string|int|float $op2
	 * @return string|null
	 */
	public function div($op1, $op2): ?string {
		return bcdiv((string) $op1, (string) $op2, $this->scale);
	}

	/**
	 * @param string|int|float $op1
	 * @param string|int|float $op2
	 * @return string
	 */
	public function sub($op1, $op2) {
		return bcsub((string) $op1, (string) $op2, $this->scale);
	}

	/**
	 * @param string|int|float $op1
	 * @param string|int|float $op2
	 * @return int
	 */
	public function comp($op1, $op2): int {
		return bccomp((string) $op1, (string) $op2, $this->scale);
	}

}
