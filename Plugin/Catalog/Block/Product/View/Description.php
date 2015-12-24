<?php
namespace Dfe\Frontend\Plugin\Catalog\Block\Product\View;
use Dfe\Frontend\Settings\Sku as Settings;
use Magento\Catalog\Block\Product\View\Description as _Description;
class Description {
	/**
	 * 2015-11-13
	 * Цель метода — возможность скрытия и настройки внешнего вида
	 * артикула на витринных страницах товаров.
	 * https://github.com/magento/magento2/issues/2354
	 * https://mage2.pro/t/203
	 * https://mage2.pro/t/202
	 * @see \Magento\Catalog\Block\Product\View\Description::toHtml()
	 * @param _Description $subject
	 * @param \Closure $proceed
	 * @return string
	 */
	public function aroundToHtml(_Description $subject, \Closure $proceed) {
		/** @var string $result */
		/** https://github.com/magento/magento2/blob/2335247d4ae2dc1e0728ee73022b0a244ccd7f4c/app/code/Magento/Catalog/view/frontend/layout/catalog_product_view.xml#L39 */
		if ('sku' !== $subject['at_code']) {
			$result = $proceed();
		}
		else {
			/**
			 * 2015-12-21
			 * «Frontend» → «SKU» → «Show ID instead of SKU?»
			 * https://github.com/magento/magento2/blob/2.0.0/app/code/Magento/Catalog/view/frontend/layout/catalog_product_view.xml#L38
			 */
			if (Settings::s()->showIdInsteadOfSku()) {
				$subject['at_call'] = 'getId';
			}
			/** @var string $label */
			$label = Settings::s()->label();
			if ('SKU' !== $label) {
				/**
				 * 2015-12-21
				 * https://github.com/magento/magento2/blob/2.0.0/app/code/Magento/Catalog/view/frontend/templates/product/view/attribute.phtml#L37
				 */
				$subject['at_label'] = !$label ? 'none' : __($label);
			}
			if (Settings::s()->needHideFor($subject->getProduct())) {
				$result = '';
			}
			else {
				if (!Settings::s()->showLabel()) {
					/**
					 * 2015-11-14
					 * https://github.com/magento/magento2/blob/2335247d4ae2dc1e0728ee73022b0a244ccd7f4c/app/code/Magento/Catalog/view/frontend/layout/catalog_product_view.xml#L41
					 * https://github.com/magento/magento2/blob/2335247d4ae2dc1e0728ee73022b0a244ccd7f4c/app/code/Magento/Catalog/view/frontend/templates/product/view/attribute.phtml#L37
					 */
					$subject['at_label'] = 'none';
				}
				$result = $proceed();
			}
		}
		return $result;
	}
}



