<?php
namespace Dfe\Frontend\Plugin\Theme\Block\Html;
use Dfe\Frontend\Settings\Common\Header as S;
use Magento\Theme\Block\Html\Header as _Header;
class Header {
	/**
	 * 2016-01-01
	 * Цель плагина — предоставить администратору возможность
	 * скрывать приветствие «Welcome, John Doe!» из правого угла шапки витринных страниц.
	 * «Mage2.PRO» → «Frontend» → «Common» → «Header» → «Hide the Welcome Message?».
	 *
	 * @see \Magento\Theme\Block\Html\Header::toHtml()
	 * https://github.com/magento/magento2/blob/2.0.0/lib/internal/Magento/Framework/View/Element/AbstractBlock.php#L635-L662
	 *
	 * @param _Header $subject
	 * @param \Closure $proceed
	 * @return string
	 */
	public function aroundToHtml(_Header $subject, \Closure $proceed) {
		// 2016-01-01
		// https://github.com/magento/magento2/blob/2.0.0/app/code/Magento/Theme/view/frontend/templates/html/header.phtml#L14-L15
		/** @noinspection PhpUndefinedMethodInspection */
		return 'welcome' === $subject->getShowPart() && S::s()->hideWelcome() ? '' : $proceed();
	}
}