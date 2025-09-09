<?php
declare(strict_types=1);

namespace Loki\Theme\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class FormKeyValue implements ArgumentInterface
{
    public function __construct(
        private \Magento\Framework\Data\Form\FormKey $formKey,
    ) {
    }

    public function get(): string
    {
        return $this->formKey->getFormKey();
    }
}
