<?php
namespace Dfe\ProductView\ConfigSource\Visibility;
use Magento\Catalog\Model\Product;
use Magento\Framework\Option\ArrayInterface;
class VD implements ArrayInterface {
	/**
	 * 2015-11-13
	 * @override
	 * @see \Magento\Framework\Option\ArrayInterface::toOptionArray()
	 * @return array(array(string => string))
	 */
	public function toOptionArray() {
		return df_map_to_options_t([
			'Visible'
			, self::$ALL_BUT_VIRTUAL_AND_DOWNLOADABLE =>
				'Visible for all but the Virtual and Downloadable Products'
			, self::$NONE => 'Hidden'
		]);
	}

	/**
	 * 2015-12-25
	 * @param Product $product
	 * @param string|null $visibility
	 * @return string
	 */
	public static function needHideFor(Product $product, $visibility) {
		return
			self::$NONE === $visibility
			|| (
				self::$ALL_BUT_VIRTUAL_AND_DOWNLOADABLE === $visibility
				&& df_virtual_or_downloadable($product)
			)
		;
	}

	/** @var string */
	private static $ALL_BUT_VIRTUAL_AND_DOWNLOADABLE = 'for_virtual_and_downloadable';
	/** @var string */
	private static $NONE = 'none';
}
