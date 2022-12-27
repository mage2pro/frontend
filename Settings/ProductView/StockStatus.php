<?php
namespace Dfe\Frontend\Settings\ProductView;
use Df\Typography\Font;
use Dfe\Frontend\ConfigSource\Visibility\Product\VD as Visibility;
use Magento\Catalog\Model\Product;
/** @method static StockStatus s() */
final class StockStatus extends \Df\Config\Settings {
	/** @used-by \Dfe\Frontend\Block\ProductView\Css::fonts() */
	function font():Font {return $this->_font('font');}

	/**
	 * 2015-11-14
	 * «Product View» → «Stock Status» → «Visibility»
	 * https://mage2.pro/t/196
	 * https://mage2.pro/t/197
	 * @used-by \Dfe\Frontend\Plugin\Catalog\Block\Product\AbstractProduct::afterDisplayProductStockStatus()
	 */
	function needHideFor(Product $p):bool {return Visibility::needHideFor($p, $this->v('visibility'));}

	/**
	 * @override
	 * @see \Df\Config\Settings::prefix()
	 * @used-by \Df\Config\Settings::v()
	 */
	protected function prefix():string {return 'dfe_frontend/product_view/stock_status';}
}