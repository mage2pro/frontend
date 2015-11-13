<?php
namespace Dfe\FrontendTweaks\Plugin\Catalog\Block\Product\View;
use Dfe\FrontendTweaks\Settings\ProductView as ProductViewSettings;
use Magento\Catalog\Block\Product\View\Description as _Description;
class Description {
	/**
	 * 2015-11-13
	 * Цель метода — возможность скрытия артикула с витринных страниц товаров.
	 * https://github.com/magento/magento2/issues/2354
	 * https://mage2.pro/t/203
	 * https://mage2.pro/t/202
	 * https://github.com/magento/magento2/blob/2335247d4ae2dc1e0728ee73022b0a244ccd7f4c/app/code/Magento/Catalog/view/frontend/layout/catalog_product_view.xml#L39
	 * @see \Magento\Catalog\Block\Product\View\Description::toHtml()
	 * @param _Description $subject
	 * @param \Closure $proceed
	 * @return string
	 */
	public function aroundToHtml(_Description $subject, \Closure $proceed) {
		return
			'sku' === $subject['at_code']
			&& ProductViewSettings::s()->hideSku($subject->getProduct())
			? ''
			: $proceed()
		;
	}
}



