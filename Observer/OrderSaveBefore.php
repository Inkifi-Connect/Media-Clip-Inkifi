<?php
namespace Mangoit\MediaclipHub\Observer;
use Magento\Framework\App\ObjectManager as OM;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Model\Order as O;
use Mangoit\MediaclipHub\Observer\CheckoutSuccess as CS;
/**
 * 2018-06-26 Dmitry Fedyuk https://www.upwork.com/fl/mage2pro
 * "Prevent the «Pending Payment» orders from being sent to MediaClip Photobook in my Magento 2 store":
 * https://www.upwork.com/ab/f/contracts/20288301
 */
final class OrderSaveBefore implements ObserverInterface {
	/**
	 * 2018-06-26
	 * @override
	 * @see ObserverInterface::execute()
	 * What events are triggered on an order placement? https://mage2.pro/t/3573
	 * @param Observer $ob
	 */
	function execute(Observer $ob) {
		$o = $ob['order']; /** @var O $o */
		if ($id = $o->getId()) {
			$o2 = OM::getInstance()->create(O::class);
			$o2->load($id);
			if ('pending_payment' === $o2->getStatus()
				&& !in_array($o->getStatus(), [
					'canceled', 'closed', 'fraud', 'holded', 'payment_review', 'pending_payment',
				])
			) {
				CS::post($o);
			}
		}
	}
}