<?php
namespace Dfe\ProductView\Block;
use Df\Typography\Css as Renderer;
use Df\Typography\Font;
use Dfe\ProductView\Settings\Compare as SettingsCompare;
use Dfe\ProductView\Settings\Price as SettingsPrice;
use Dfe\ProductView\Settings\Reviews as SettingsReviews;
use Dfe\ProductView\Settings\ShortDescription as SettingsShortDescription;
use Dfe\ProductView\Settings\Sku as SettingsSku;
use Dfe\ProductView\Settings\StockStatus as SettingsStockStatus;
use Dfe\ProductView\Settings\Title as SettingsTitle;
use Dfe\ProductView\Settings\Wishlist as SettingsWishlist;
class Css extends \Magento\Framework\View\Element\AbstractBlock {
	/**
	 * 2015-12-20
	 * @override
	 * @see \Magento\Framework\View\Element\AbstractBlock::_toHtml()
	 * @used-by \Magento\Framework\View\Element\AbstractBlock::toHtml
	 * @return string
	 */
	protected function _toHtml() {
		return !df_action_catalog_product_view() ? '' : df_n_prepend(df_concat_n(array_merge(
			array_map(function(Font $font) {return df_link_inline($font->link());}, $this->fonts())
			, [df_style_inline(df_concat_n(array_merge(
				df_map(function(Font $font, $selector) {
					return $font->css($selector);
				}, $this->fonts(), [], [], RM_AFTER)
				,[$this->customCss()]
			)))]
		)));
	}
	
	/**
	 * 2015-12-25
	 * @return string
	 */
	private function customCss() {
		/** @var Renderer $r */
		$r = Renderer::i();
		/** @var string $labelSuffix */
		$labelSuffix = SettingsSku::s()->labelSuffix();
		if ('#:' !== $labelSuffix) {
			$r->rule(
				'content'
				, df_quote_single($labelSuffix)
				, '.product-info-main .product.attibute.sku .type:after'
			);
		}
		df_map(function(Font $font, $selector) use ($r) {
			if ($font->enabled() && !$font->familyIsStandard()) {
				$r->rule('font-family', df_quote_single('luma-icons'), $selector . ':after');
			}
		}, [
			self::$TO_COMPARE => SettingsCompare::s()->font()
			,self::$TO_WISHLIST => SettingsWishlist::s()->font()
		], [], [], RM_AFTER);
		return $r->render();
	}

	/**
	 * 2015-12-25
	 * @return array(mixed => Font)
	 */
	private function fonts() {
		if (!isset($this->{__METHOD__})) {
			$this->{__METHOD__} = [
				'.sku > .type' => SettingsSku::s()->fontL()
				,'.sku > .value' => SettingsSku::s()->fontV()
				,'.stock' => SettingsStockStatus::s()->font()
				,'.product-info-main .price' => SettingsPrice::s()->font()
				,'.product-info-main [itemprop="name"]' => SettingsTitle::s()->font()
				,'.product-info-main [itemprop="description"]' => SettingsShortDescription::s()->font()
				// 2015-12-26
				// «a» надо обязательно включать в селектор, иначе стандартный победит.
				,'.product-info-main .product-reviews-summary a'  => SettingsReviews::s()->font()
				,self::$TO_COMPARE => SettingsCompare::s()->font()
				,self::$TO_WISHLIST => SettingsWishlist::s()->font()
			];
		}
		return $this->{__METHOD__};
	}

	/** @var string */
	private static $TO_COMPARE = '.product-info-main .tocompare';
	/** @var string */
	private static $TO_WISHLIST = '.product-info-main .towishlist';
}


