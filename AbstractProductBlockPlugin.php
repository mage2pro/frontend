<?php
namespace Dfe\FrontendTweaks;
use Dfe\FrontendTweaks\Settings\ProductView as ProductViewSettings;
use Magento\Catalog\Block\Product\AbstractProduct;
class AbstractProductBlockPlugin {
	/**
	 * 2015-11-13
	 * Цель метода — поддержка опции
	 * «Hide Stock Status for the Virtual and Downloadable Products?».
	 * https://mage2.pro/t/198
	 * К сожалению, мы не можем для этой цели использовать событие
	 * «catalog_block_product_status_display»:
	 * https://github.com/magento/magento2/blob/2335247d4ae2dc1e0728ee73022b0a244ccd7f4c/app/code/Magento/Catalog/Block/Product/AbstractProduct.php#L374-L379
		$statusInfo = new \Magento\Framework\DataObject(['display_status' => true]);
		$this->_eventManager->dispatch('catalog_block_product_status_display', ['status' => $statusInfo]);
		return (bool) $statusInfo->getDisplayStatus();
	 * потому что в настоящее время Magento 2 не имеет возможности
	 * задать порядок вызова обработчиков события:
	 * https://github.com/magento/magento2/issues/2354
	 * https://mage2.pro/t/200
	 * @see \Magento\Catalog\Block\Product\AbstractProduct::displayProductStockStatus()
	 * @param AbstractProduct $subject
	 * @param string $result
	 * @return string
	 */
	public function afterDisplayProductStockStatus(AbstractProduct $subject, $result) {
		return $result && !(
			in_array($subject->getProduct()->getTypeId(), ['virtual', 'downloadable'])
			&& ProductViewSettings::s()->hideStockStatusForVirtualAndDownloadableProdusts()
		);
	}
}



