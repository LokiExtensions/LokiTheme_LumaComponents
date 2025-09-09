<?php declare(strict_types=1);

namespace Loki\Theme\Observer;

use Loki\Theme\Config\ThemeConfig;
use Magento\Framework\App\State as AppState;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\Element\AbstractBlock;

class AddAlpineData implements ObserverInterface
{
    public function __construct(
        private readonly ThemeConfig $themeConfig,
        private readonly AppState $appState,
        private array $componentDefinitions = []
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

        foreach ($this->componentDefinitions as $blockName => $componentName) {
            if ($blockName === $block->getNameInLayout()) {
                $html = $this->addComponentNameToHtml($html, $componentName, $block);
            }
        }

        if ($this->isDeveloperMode()) {
            $html = "<!-- TEMPLATE: ".$block->getTemplateFile()." -->\n".$html;
            $html = "<!-- BLOCK: ".$block->getNameInLayout()." -->\n".$html;
        }

        $transport->setHtml($html);
    }

    private function addComponentNameToHtml(
        string $html,
        string $componentName,
        AbstractBlock $block
    ): string {
        $additional = '';
        $additional .= ' x-data="'.$componentName.'"';

        if ($this->isDeveloperMode()) {
            $blockName = str_replace('.', '-', $block->getNameInLayout());
            $additional .= ' x-title="'.$blockName.'"';
        }

        return preg_replace('/^<([a-z]+)/msi', '<\1 '.$additional, $html);
    }

    private function isDeveloperMode(): bool
    {
        return $this->appState->getMode() === AppState::MODE_DEVELOPER;
    }
}
