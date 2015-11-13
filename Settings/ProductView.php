<?php
namespace Dfe\FrontendTweaks\Settings;
use Dfe\FrontendTweaks\ConfigSource\HideSku;
use Magento\Catalog\Model\Product;
class ProductView extends \Df\Core\Settings {
	/**
	 * 2015-11-13
	 * «Hide the SKU?»
	 * https://mage2.pro/t/203
	 * https://mage2.pro/t/197
	 * @param Product $product
	 * @return string
	 */
	public function hideSku(Product $product) {
		/** @var string $v */
		$v = $this->v('hide_sku');
		return
			HideSku::FOR_ALL === $v
			|| (
				HideSku::FOR_VIRTUAL_AND_DOWNLOADABLE === $v
				&& self::virtualOrDownloadable($product)
			)
		;
	}

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
			self::virtualOrDownloadable($product)
			&& $this->b('hide_stock_status_for_virtual_and_downloadable_products')
		;
	}

	/**
	 * @override
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_frontend_tweaks/product_view/';}

	/** @return \Dfe\FrontendTweaks\Settings\ProductView */
	public static function s() {static $r; return $r ? $r : $r = df_o(__CLASS__);}

	/**
	 * @param Product $product
	 * @return bool
	 */
	private static function virtualOrDownloadable(Product $product) {
		return in_array($product->getTypeId(), ['virtual', 'downloadable']);
	}
}