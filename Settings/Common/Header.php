<?php
namespace Dfe\Frontend\Settings\Common;
/** @method static Header s() */
class Header extends \Df\Core\Settings {
	/**
	 * 2016-01-01
	 * «Mage2.PRO» → «Frontend» → «Common» → «Header» → «Hide the Welcome Message?»
	 * @return bool
	 */
	public function hideWelcome() {return $this->enable() && $this->b();}

	/**
	 * @override
	 * @see \Df\Core\Settings::prefix()
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_frontend/common/header/';}
}