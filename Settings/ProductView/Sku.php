<?php
namespace Dfe\Frontend\Settings\ProductView;
use Df\Typography\Font;
use Dfe\Frontend\ConfigSource\Visibility\Product\VD as Visibility;
use Magento\Catalog\Model\Product;
/** @method static Sku s() */
final class Sku extends \Df\Config\Settings {
	/** @return Font */
	function fontL() {return $this->_font('label_font');}

	/** @return Font */
	function fontV() {return $this->_font('value_font');}

	/**
	 * 2015-12-21
	 * @return string
	 */
	function label() {return $this->v();}

	/**
	 * 2015-12-21
	 * @return string
	 */
	function labelSuffix() {return $this->v('label_suffix');}

	/**
	 * 2015-11-14
	 * «Product View» → «SKU» → «Visibility»
	 * https://mage2.pro/t/203
	 * https://mage2.pro/t/197
	 * @param Product $product
	 * @return string
	 */
	function needHideFor(Product $product) {return Visibility::needHideFor($product, $this->v('visibility'));}

	/**
	 * 2015-12-21
	 * «Product View» → «SKU» → «Show ID instead of SKU?»
	 * @return string
	 */
	function showIdInsteadOfSku() {return $this->b('id_instead_of_sku');}

	/**
	 * 2015-11-14
	 * «Product View» → «SKU» → «Show Label?»
	 * @return bool
	 */
	function showLabel() {return $this->b('show_label');}

	/**
	 * @override
	 * @see \Df\Config\Settings::prefix()
	 * @used-by \Df\Config\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_frontend/product_view/sku';}
}