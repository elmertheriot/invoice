<?php declare(strict_types = 1);

namespace Contributte\Invoice\Preview;

use Contributte\Invoice\Data\Account;
use Contributte\Invoice\Data\Company;
use Contributte\Invoice\Data\Customer;
use Contributte\Invoice\Data\Order;
use Contributte\Invoice\Data\PaymentInformation;
use DateTime;

final class PreviewFactory
{

	public static function createCompany(): Company
	{
		return new Company('Contributte', 'Prague', 'U haldy', '110 00', 'Czech Republic', '08304431', 'CZ08304431');
	}

	public static function createCustomer(): Customer
	{
		return new Customer('John Doe', 'Los Angeles', 'Cavetown', '720 55', 'USA', '08304431', 'CZ08304431');
	}

	public static function createOrder(): Order
	{
		$account = new Account('2353462013/0800', 'CZ4808000000002353462013', 'GIGACZPX');
		$paymentInfo = new PaymentInformation('$', '0123456789', '1234', 0.21);

		$order = new Order(date('Y') . '0001', new DateTime('+ 7 days'), $account, $paymentInfo);
		$order->addItem('Logitech G700s Rechargeable Gaming Mouse', 1790, 4);
		$order->addItem('ASUS Z380KL 8" - 16GB, LTE, bílá', 6490, 1);
		$order->addItem('Philips 48PFS6909 - 121cm', 13990, 1);
		$order->addItem('HP Deskjet 3545 Advantage', 1799, 1);
		$order->addItem('LG 105UC9V - 266cm', 11599, 2);

		return $order;
	}

}
