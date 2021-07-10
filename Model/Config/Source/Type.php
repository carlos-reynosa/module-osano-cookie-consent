<?php

namespace CarlosReynosa\OsanoCookieConsent\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class Type
 * @package CarlosReynosa\OsanoCookieConsent\Model\Config\Source
 */
class Type implements OptionSourceInterface
{
    /**
     * @return array
     */
    public function toOptionArray() : array
    {
        return [
            ['value' => 'info', 'label' => __('Info')],
            ['value' => 'opt-in', 'label' => __('Opt-In')],
            ['value' => 'opt-out', 'label' => __('Opt-Out')]
        ];
    }
}