<?php declare(strict_types=1);

namespace Loki\Theme\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\View\Design\Theme\ThemeList;
use Magento\Framework\View\Design\ThemeInterface;

class ThemePathOptions implements OptionSourceInterface
{
    public function __construct(
        private readonly ThemeList $themeList,
    ){
    }

    public function toOptionArray()
    {
        $options = [];
        foreach ($this->themeList->getItems() as $theme) {
            /** @var ThemeInterface $theme */
            $options[] = [
                'value' => $theme->getThemePath(),
                'label' => $theme->getThemePath(),
            ];
        }

        return $options;
    }
}
