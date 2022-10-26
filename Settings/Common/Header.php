<?php
namespace Dfe\Frontend\Settings\Common;
/** @method static Header s() */
final class Header extends \Df\Config\Settings {
	/**
	 * 2016-01-01 «Mage2.PRO» → «Frontend» → «Common» → «Header» → «Hide the Welcome Message?»
	 * @return bool
	 */
	function hideWelcome() {return $this->enable() && $this->b();}

	/**
	 * @override
	 * @see \Df\Config\Settings::prefix()
	 * @used-by \Df\Config\Settings::v()
	 */
	protected function prefix():string {return 'dfe_frontend/common/header';}
}