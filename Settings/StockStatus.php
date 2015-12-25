<?php
namespace Dfe\ProductView\Settings;
use Dfe\ProductView\ConfigSource\Visibility\VD as Visibility;
use Magento\Catalog\Model\Product;
class StockStatus extends \Df\Core\Settings {
	/**
	 * 2015-11-14
	 * «Product View» → «Stock Status» → «Visibility»
	 * https://mage2.pro/t/196
	 * https://mage2.pro/t/197
	 * @param Product $product
	 * @return string
	 */
	public function needHideFor(Product $product) {
		/** @var string $v */
		$v = $this->v('visibility');
		return
			Visibility::NONE === $v
			|| (
				Visibility::ALL_BUT_VIRTUAL_AND_DOWNLOADABLE === $v
				&& df_virtual_or_downloadable($product)
			)
		;
	}

	/**
	 * @override
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_product_view/stock_status/';}

	/** @return \Dfe\ProductView\Settings\StockStatus */
	public static function s() {static $r; return $r ? $r : $r = df_o(__CLASS__);}
}