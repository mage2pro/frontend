<?php
namespace Dfe\Frontend\Settings;
use Df\Typography\Font;
use Dfe\Frontend\ConfigSource\SkuVisibility as Visibility;
use Magento\Catalog\Model\Product;
class Sku extends \Df\Core\Settings {
	/** @return Font */
	public function fontL() {return $this->font('label_font');}

	/** @return Font */
	public function fontV() {return $this->font('value_font');}

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
	 * «Frontend» → «SKU» → «Visibility»
	 * https://mage2.pro/t/203
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
	 * 2015-12-21
	 * «SKU» → «Frontend» → «Show ID instead of SKU?»
	 * @return string
	 */
	public function showIdInsteadOfSku() {return $this->b('id_instead_of_sku');}

	/**
	 * 2015-11-14
	 * «SKU» → «Frontend» → «Show Label?»
	 * @return bool
	 */
	public function showLabel() {return $this->b('show_label');}

	/**
	 * @override
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_frontend/sku/';}

	/** @return $this */
	public static function s() {static $r; return $r ? $r : $r = df_o(__CLASS__);}
}