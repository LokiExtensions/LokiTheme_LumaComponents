<?php declare(strict_types=1);

namespace Loki\Theme\Observer;

use Loki\Theme\Config\ThemeConfig;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Message\Manager;
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

        $messageManager = ObjectManager::getInstance()->get(Manager::class);
        $messageManager->addErrorMessage('Test error');
        $messageManager->addWarningMessage('Test warning');
        $messageManager->addSuccessMessage('Test success');
        $messageManager->addNoticeMessage('Test notice');

        if (false === $this->themeConfig->modifyCurrentTheme()) {
            return;
        }

        $this->layout->getUpdate()->addHandle('loki_theme_remove_legacy_js');
        $this->layout->getUpdate()->addHandle('loki_theme_add_alpine');
    }
}
