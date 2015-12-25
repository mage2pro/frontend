<?php
namespace Dfe\ProductView\Settings;
use Df\Typography\Font;
class ShortDescription extends \Df\Core\Settings {
	/** @return Font */
	public function font() {return $this->_font('font');}
	/**
	 * @override
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_product_view/short_description/';}

	/** @return $this */
	public static function s() {static $r; return $r ? $r : $r = df_o(__CLASS__);}
}