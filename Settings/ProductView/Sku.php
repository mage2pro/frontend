<?php
namespace Dfe\Frontend\Settings\ProductView;
use Df\Typography\Font;
use Dfe\Frontend\ConfigSource\Visibility\Product\VD as Visibility;
use Magento\Catalog\Model\Product;
class Sku extends \Df\Core\Settings {
	/** @return Font */
	public function fontL() {return $this->_font('label_font');}

	/** @return Font */
	public function fontV() {return $this->_font('value_font');}

	/**
	 * 2015-12-21
	 * @return string
	 */
	public function label() {return $this->v(__FUNCTION__);}

	/**
	 * 2015-12-21
	 * @return string
	 */
	public function labelSuffix() {return $this->v('label_suffix');}

	/**
	 * 2015-11-14
	 * «Product View» → «SKU» → «Visibility»
	 * https://mage2.pro/t/203
	 * https://mage2.pro/t/197
	 * @param Product $product
	 * @return string
	 */
	public function needHideFor(Product $product) {
		return Visibility::needHideFor($product, $this->v('visibility'));
	}

	/**
	 * 2015-12-21
	 * «Product View» → «SKU» → «Show ID instead of SKU?»
	 * @return string
	 */
	public function showIdInsteadOfSku() {return $this->b('id_instead_of_sku');}

	/**
	 * 2015-11-14
	 * «Product View» → «SKU» → «Show Label?»
	 * @return bool
	 */
	public function showLabel() {return $this->b('show_label');}

	/**
	 * @override
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_frontend/product_view/sku/';}

	/** @return $this */
	public static function s() {static $r; return $r ? $r : $r = df_o(__CLASS__);}
}