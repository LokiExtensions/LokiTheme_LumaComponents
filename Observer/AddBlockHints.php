<?php declare(strict_types=1);

namespace Loki\Theme\Observer;

use Loki\Theme\Config\ThemeConfig;
use Magento\Framework\App\State as AppState;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddBlockHints implements ObserverInterface
{
    public function __construct(
        private readonly ThemeConfig $themeConfig,
        private readonly AppState $appState,
    ) {
    }

    public function execute(Observer $observer): void
    {
        if (false === $this->themeConfig->modifyCurrentTheme()) {
            return;
        }

        $transport = $observer->getEvent()->getTransport();
        $block = $observer->getEvent()->getBlock();
        $html = (string)$transport->getHtml();
        $html = trim($html);
        if (empty($html)) {
            return;
        }

        if ($this->isDeveloperMode()) {
            $html = "<!-- TEMPLATE: ".$block->getTemplateFile()." -->\n".$html;
            $html = "<!-- BLOCK: ".$block->getNameInLayout()." -->\n".$html;
        }

        $transport->setHtml($html);
    }

    private function isDeveloperMode(): bool
    {
        return $this->appState->getMode() === AppState::MODE_DEVELOPER;
    }
}
