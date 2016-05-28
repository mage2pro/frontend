<?php
namespace Dfe\Frontend\Settings\ProductView;
use Df\Typography\Font;
use Dfe\Frontend\ConfigSource\Visibility\Product\VD as Visibility;
use Magento\Catalog\Model\Product;
class StockStatus extends \Df\Core\Settings {
	/** @return Font */
	public function font() {return $this->_font('font');}

	/**
	 * 2015-11-14
	 * «Product View» → «Stock Status» → «Visibility»
	 * https://mage2.pro/t/196
	 * https://mage2.pro/t/197
	 * @param Product $product
	 * @return string
	 */
	public function needHideFor(Product $product) {
		return Visibility::needHideFor($product, $this->v('visibility'));
	}

	/**
	 * @override
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_frontend/product_view/stock_status/';}

	/** @return self */
	public static function s() {static $r; return $r ? $r : $r = df_o(__CLASS__);}
}