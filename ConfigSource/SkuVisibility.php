<?php
namespace Dfe\Frontend\ConfigSource;
use Magento\Framework\Option\ArrayInterface;
class SkuVisibility implements ArrayInterface {
	/**
	 * 2015-11-13
	 * @override
	 * @see \Magento\Framework\Option\ArrayInterface::toOptionArray()
	 * @return array(array(string => string))
	 */
	public function toOptionArray() {
		return df_map_to_options_t([
			'Visible'
			, self::ALL_BUT_VIRTUAL_AND_DOWNLOADABLE =>
				'Visible for all but the Virtual and Downloadable Products'
			, self::NONE => 'Hidden'
		]);
	}

	const ALL_BUT_VIRTUAL_AND_DOWNLOADABLE = 'for_virtual_and_downloadable';
	const NONE = 'none';
}
