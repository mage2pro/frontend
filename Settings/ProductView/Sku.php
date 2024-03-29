<?php
namespace Dfe\Frontend\Settings\ProductView;
use Df\Typography\Font;
use Dfe\Frontend\ConfigSource\Visibility\Product\VD as Visibility;
use Magento\Catalog\Model\Product;
/** @method static Sku s() */
final class Sku extends \Df\Config\Settings {
	/** @used-by \Dfe\Frontend\Block\ProductView\Css::fonts() */
	function fontL():Font {return $this->_font('label_font');}

	/** @used-by \Dfe\Frontend\Block\ProductView\Css::fonts() */
	function fontV():Font {return $this->_font('value_font');}

	/**
	 * 2015-12-21
	 * @used-by \Dfe\Frontend\Plugin\Catalog\Block\Product\View\Description::aroundToHtml()
	 */
	function label():string {return $this->v();}

	/**
	 * 2015-12-21
	 * @used-by \Dfe\Frontend\Block\ProductView\Css::customCss()
	 */
	function labelSuffix():string {return $this->v('label_suffix');}

	/**
	 * 2015-11-14
	 * «Product View» → «SKU» → «Visibility»
	 * https://mage2.pro/t/203
	 * https://mage2.pro/t/197
	 * @used-by \Dfe\Frontend\Plugin\Catalog\Block\Product\AbstractProduct::afterDisplayProductStockStatus()
	 * @used-by \Dfe\Frontend\Plugin\Catalog\Block\Product\View\Description::aroundToHtml()
	 */
	function needHideFor(Product $p):string {return Visibility::needHideFor($p, $this->v('visibility'));}

	/**
	 * 2015-12-21 «Product View» → «SKU» → «Show ID instead of SKU?»
	 * @used-by \Dfe\Frontend\Plugin\Catalog\Block\Product\View\Description::aroundToHtml()
	 */
	function showIdInsteadOfSku():string {return $this->b('id_instead_of_sku');}

	/**
	 * 2015-11-14 «Product View» → «SKU» → «Show Label?»
	 * @used-by \Dfe\Frontend\Plugin\Catalog\Block\Product\View\Description::aroundToHtml()
	 */
	function showLabel():bool {return $this->b('show_label');}

	/**
	 * @override
	 * @see \Df\Config\Settings::prefix()
	 * @used-by \Df\Config\Settings::v()
	 */
	protected function prefix():string {return 'dfe_frontend/product_view/sku';}
}