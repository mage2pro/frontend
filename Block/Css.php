<?php
namespace Dfe\ProductView\Block;
use Df\Typography\Css as CssRenderer;
use Dfe\ProductView\Settings\Sku as SettingsSku;
use Dfe\ProductView\Settings\StockStatus as SettingsStockStatus;
class Css extends \Magento\Framework\View\Element\AbstractBlock {
	/**
	 * 2015-12-20
	 * @override
	 * @see \Magento\Framework\View\Element\AbstractBlock::_toHtml()
	 * @used-by \Magento\Framework\View\Element\AbstractBlock::toHtml
	 * @return string
	 */
	protected function _toHtml() {
		/** @var string $result */
		$result = '';
		if (df_action_catalog_product_view()) {
			/** @var string $cssS */
			$cssS = df_concat_n(
				SettingsSku::s()->fontL()->css('.sku > .type')
				,SettingsSku::s()->fontV()->css('.sku > .value')
				,SettingsStockStatus::s()->font()->css('.stock')
			);
			if ($cssS) {
				$result .= "\n" . df_concat_n(
					df_link_inline(SettingsSku::s()->fontL()->link())
					, df_link_inline(SettingsSku::s()->fontV()->link())
					, df_link_inline(SettingsStockStatus::s()->font()->link())
				);
			}
			/** @var CssRenderer $css */
			$css = CssRenderer::i();
			/** @var string $labelSuffix */
			$labelSuffix = SettingsSku::s()->labelSuffix();
			if ('#:' !== $labelSuffix) {
				$css->rule(
					'content'
					, df_quote_single($labelSuffix)
					, '.product-info-main .product.attibute.sku .type:after'
				);
			}
			$cssS .= "\n" . $css->render();
			$result .= "\n" . df_style_inline($cssS);
		}
		return $result;
	}
}


