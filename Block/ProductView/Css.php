<?php
namespace Dfe\Frontend\Block\ProductView;
use Df\Typography\Css as Renderer;
use Df\Typography\Font;
use Dfe\Frontend\Settings\ProductView\Compare as SettingsCompare;
use Dfe\Frontend\Settings\ProductView\Price as SettingsPrice;
use Dfe\Frontend\Settings\ProductView\Reviews as SettingsReviews;
use Dfe\Frontend\Settings\ProductView\ShortDescription as SettingsShortDescription;
use Dfe\Frontend\Settings\ProductView\Sku as SettingsSku;
use Dfe\Frontend\Settings\ProductView\StockStatus as SettingsStockStatus;
use Dfe\Frontend\Settings\ProductView\Title as SettingsTitle;
use Dfe\Frontend\Settings\ProductView\Wishlist as SettingsWishlist;
use Magento\Framework\View\Element\AbstractBlock as _P;
# 2015-12-20
/** @final Unable to use the PHP «final» keyword here because of the M2 code generation. */
class Css extends _P {
	/**
	 * 2015-12-20
	 * @override
	 * @see _P::_toHtml()
	 * @used-by _P::toHtml():
	 *		$html = $this->_loadCache();
	 *		if ($html === false) {
	 *			if ($this->hasData('translate_inline')) {
	 *				$this->inlineTranslation->suspend($this->getData('translate_inline'));
	 *			}
	 *			$this->_beforeToHtml();
	 *			$html = $this->_toHtml();
	 *			$this->_saveCache($html);
	 *			if ($this->hasData('translate_inline')) {
	 *				$this->inlineTranslation->resume();
	 *			}
	 *		}
	 *		$html = $this->_afterToHtml($html);
	 * https://github.com/magento/magento2/blob/2.2.0/lib/internal/Magento/Framework/View/Element/AbstractBlock.php#L643-L689
	 */
	final protected function _toHtml():string {return !df_is_catalog_product_view() ? '' : df_n_prepend(df_cc_n(
		array_merge(
			array_map(function(Font $font) {return df_link_inline($font->link());}, $this->fonts())
			,[df_style_inline(df_cc_n(array_merge(
				df_map_k(function($selector, Font $font) {return $font->css($selector);}, $this->fonts())
				,[$this->customCss()]
			)))]
		)
	));}
	
	/**
	 * 2015-12-25
	 * @used-by self::_toHtml()
	 * @return string
	 */
	private function customCss() {
		$r = Renderer::i(); /** @var Renderer $r */
		$labelSuffix = SettingsSku::s()->labelSuffix(); /** @var string $labelSuffix */
		if ('#:' !== $labelSuffix) {
			$r->rule('content', df_quote_single($labelSuffix),' .product-info-main .product.attibute.sku .type:after');
		}
		df_map_k(function($selector, Font $font) use($r) {
			if ($font->enabled() && !$font->familyIsStandard()) {
				$r->rule('font-family', df_quote_single('luma-icons'), $selector . ':after');
			}
		}, [
			self::$TO_COMPARE => SettingsCompare::s()->font()
			,self::$TO_WISHLIST => SettingsWishlist::s()->font()
		]);
		return $r->render();
	}

	/**
	 * 2015-12-25
	 * @used-by self::_toHtml()
	 * @return array(mixed => Font)
	 */
	private function fonts() {return dfc($this, function() {return [
		'.sku > .type' => SettingsSku::s()->fontL()
		,'.sku > .value' => SettingsSku::s()->fontV()
		,'.stock' => SettingsStockStatus::s()->font()
		,'.product-info-main .price' => SettingsPrice::s()->font()
		,'.product-info-main [itemprop="name"]' => SettingsTitle::s()->font()
		,'.product-info-main [itemprop="description"]' => SettingsShortDescription::s()->font()
		# 2015-12-26 «a» надо обязательно включать в селектор, иначе стандартный победит.
		,'.product-info-main .product-reviews-summary a'  => SettingsReviews::s()->font()
		,self::$TO_COMPARE => SettingsCompare::s()->font()
		,self::$TO_WISHLIST => SettingsWishlist::s()->font()
	];});}

	/** @var string */
	private static $TO_COMPARE = '.product-info-main .tocompare';
	/** @var string */
	private static $TO_WISHLIST = '.product-info-main .towishlist';
}


