<?php declare(strict_types=1);

namespace LokiTheme\LumaComponents\Observer;

use LokiTheme\LumaComponents\Config\ThemeConfig;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\LayoutInterface;

class ApplyLayoutHandles implements ObserverInterface
{
    public function __construct(
        private readonly ThemeConfig $themeConfig,
        private readonly LayoutInterface $layout,
    ) {
    }

    public function execute(Observer $observer): void
    {
        if (false === $this->themeConfig->modifyCurrentTheme()) {
            return;
        }

        $this->layout->getUpdate()->addHandle('loki_theme_remove_legacy_js');

        foreach ($this->layout->getUpdate()->getHandles() as $handle) {
            $this->layout->getUpdate()->addHandle('loki_theme_' . $handle);
        }
    }
}
