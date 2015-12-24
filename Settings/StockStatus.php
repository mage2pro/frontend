<?php
namespace Dfe\Frontend\Settings;
use Magento\Catalog\Model\Product;
class StockStatus extends \Df\Core\Settings {
	/**
	 * 2015-11-13
	 * «Hide the Stock Status for the Virtual and Downloadable Products?»
	 * https://mage2.pro/t/196
	 * https://mage2.pro/t/197
	 * @param Product $product
	 * @return bool
	 */
	public function hideStockStatus(Product $product) {
		return
			df_virtual_or_downloadable($product)
			&& $this->b('hide_for_virtual_and_downloadable_products')
		;
	}

	/**
	 * @override
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_frontend/stock_status/';}

	/** @return \Dfe\Frontend\Settings\StockStatus */
	public static function s() {static $r; return $r ? $r : $r = df_o(__CLASS__);}
}