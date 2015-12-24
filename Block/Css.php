<?php
namespace Dfe\Frontend\Block;
use Df\Typography\Css as CssRenderer;
use Dfe\Frontend\Settings\Sku as Settings;
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
				Settings::s()->fontL()->css('.sku > .type')
				,Settings::s()->fontV()->css('.sku > .value')
			);
			if ($cssS) {
				$result .= "\n" . df_concat_n(
					df_link_inline(Settings::s()->fontL()->link())
					, df_link_inline(Settings::s()->fontV()->link())
				);
			}
			/** @var CssRenderer $css */
			$css = CssRenderer::i();
			/** @var string $labelSuffix */
			$labelSuffix = Settings::s()->labelSuffix();
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


