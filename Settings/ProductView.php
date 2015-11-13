<?php
namespace Dfe\FrontendTweaks\Settings;
class ProductView extends \Df\Core\Settings {

	/**
	 * 2015-11-13
	 * «Hide Stock Status for the Virtual and Downloadable Products?»
	 * https://mage2.pro/t/196
	 * https://mage2.pro/t/197
	 * @return bool
	 */
	public function hideStockStatusForVirtualAndDownloadableProdusts() {
		return $this->b('hide_stock_status_for_virtual_and_downloadable_products');
	}

	/**
	 * @override
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_frontend_tweaks/product_view/';}

	/** @return \Dfe\FrontendTweaks\Settings\ProductView */
	public static function s() {static $r; return $r ? $r : $r = df_o(__CLASS__);}
}