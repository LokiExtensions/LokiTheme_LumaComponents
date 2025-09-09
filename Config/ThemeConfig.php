<?php
declare(strict_types=1);

namespace Loki\Theme\Config;

use Magento\Framework\View\DesignInterface;

class ThemeConfig
{
    public function __construct(
        private readonly DesignInterface $design,
        private array $themes = [],
    ) {
    }

    public function getThemes(): array
    {
        return $this->themes;
    }

    public function modifyCurrentTheme(): bool
    {
        static $currentTheme = false;
        if (false === $currentTheme) {
            $currentTheme = $this->design->getDesignTheme()->getFullPath();
        }

        return in_array($currentTheme, $this->themes);
    }
}
