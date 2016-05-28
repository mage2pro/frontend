<?php
namespace Dfe\Frontend\Settings\Common;
class Header extends \Df\Core\Settings {
	/**
	 * 2016-01-01
	 * «Mage2.PRO» → «Frontend» → «Common» → «Header» → «Enable?»
	 * @return bool
	 */
	public function enable() {return $this->b(__FUNCTION__);}

	/**
	 * 2016-01-01
	 * «Mage2.PRO» → «Frontend» → «Common» → «Header» → «Hide the Welcome Message?»
	 * @return bool
	 */
	public function hideWelcome() {return $this->enable() && $this->b(__FUNCTION__);}

	/**
	 * @override
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_frontend/common/header/';}

	/** @return self */
	public static function s() {static $r; return $r ? $r : $r = df_o(__CLASS__);}
}