<?php

declare(strict_types=1);

namespace WebChemistry\Invoice\Components;

use WebChemistry\Invoice\Data\Item;

class Paginator implements IPaginator {

	const ITEMS_PER_PAGE = 9;

	/** @var Item[] */
	private $items;

	/** @var int */
	protected $currentPage = 0;

	/** @var int */
	protected $totalPages;

	/**
	 * @param Item[] $items
	 */
	public function __construct(array $items) {
		$this->items = $items;
		$this->totalPages = (int) ceil(count($this->items) / self::ITEMS_PER_PAGE);
	}

	/**
	 * @return int
	 */
	public function getTotalPages(): int {
		return $this->totalPages;
	}

	/**
	 * @return Item[]
	 */
	public function getItems(): array {
		$page = $this->currentPage - 1;

		return array_slice($this->items, $page * self::ITEMS_PER_PAGE, $page * self::ITEMS_PER_PAGE + self::ITEMS_PER_PAGE);
	}

	/**
	 * @return bool
	 */
	public function isLastPage(): bool {
		return $this->currentPage >= $this->getTotalPages();
	}

	/**
	 * @return int
	 */
	public function getCurrentPage(): int {
		return $this->currentPage;
	}

	/**
	 * @return bool
	 */
	public function hasNextPage(): bool {
		if ($this->isLastPage()) {
			return FALSE;
		}
		$this->currentPage++;

		return TRUE;
	}

}
