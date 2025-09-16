<?php
declare(strict_types=1);

namespace Loki\Theme\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\DesignInterface;

class ThemeConfig
{
    public function __construct(
        private readonly DesignInterface $design,
        private readonly ScopeConfigInterface $scopeConfig,
    ) {
    }

    public function getThemes(): array
    {
        $themeNames = trim($this->scopeConfig->getValue('loki_theme/general/themes'));
        if (empty($themeNames)) {
            return [];
        }

        return explode(',', $themeNames);
    }

    public function modifyCurrentTheme(): bool
    {
        static $currentTheme = false;
        if (false === $currentTheme) {
            $currentTheme = $this->design->getDesignTheme()->getThemePath();
        }

        return in_array($currentTheme, $this->getThemes());
    }
}
