<?php
namespace Dfe\Frontend\Settings\ProductView;
use Df\Typography\Font;
use Dfe\Frontend\ConfigSource\Visibility\Product\VD as Visibility;
use Magento\Catalog\Model\Product;
/** @method static StockStatus s() */
final class StockStatus extends \Df\Config\Settings {
	/** @return Font */
	function font() {return $this->_font('font');}

	/**
	 * 2015-11-14
	 * «Product View» → «Stock Status» → «Visibility»
	 * https://mage2.pro/t/196
	 * https://mage2.pro/t/197
	 */
	function needHideFor(Product $product):string {return Visibility::needHideFor($product, $this->v('visibility'));}

	/**
	 * @override
	 * @see \Df\Config\Settings::prefix()
	 * @used-by \Df\Config\Settings::v()
	 */
	protected function prefix():string {return 'dfe_frontend/product_view/stock_status';}
}