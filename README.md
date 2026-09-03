# `LokiTheme_LumaComponents` module

<!-- badges.specs.start -->
![Magento version](https://img.shields.io/badge/Magento-2.4.6%20%7C%202.4.9-orange)
![PHP version](https://img.shields.io/badge/PHP-8.2%E2%80%938.5-777BB4)
![License](https://img.shields.io/badge/License-OSL--3.0-blue)
![Packagist](https://img.shields.io/packagist/v/loki-theme/magento2-luma-components)
<!-- badges.specs.end -->

> Replace Magento Luma's legacy JavaScript stack with lightweight, CSP-friendly JavaScript and Alpine.js components.

## Links
- [Loki Theme Kit](https://loki-extensions.com/theme-kit)
- [Documentation](https://docs.loki-extensions.com/checkout/dev/modules/LokiTheme_LumaComponents)
- [Issues](https://github.com/LokiExtensions/LokiTheme_LumaComponents/issues)

## Installation
```bash
composer require loki-theme/magento2-luma-components
bin/magento module:enable LokiTheme_LumaComponents
```

## What this is
This module removes legacy Luma JavaScript (RequireJS, Knockout.js, jQuery, jQuery UI) and replaces it with custom JavaScript where needed. The following variations for this rewrite exist - taking in mind that this module tries to make as little template override as possible:

- No JavaScript, just plain HTML and CSS;
- Simple JavaScript functions;
- Alpine.js components (with or without custom template);

## Included components

| Component | Replacement |
|-----------|-------------|
| Messages | ✅ Vanilla JS |
| Cookie Notice | ✅ Alpine.js |
| Desktop Navigation | ✅ Alpine.js |
| Mobile Navigation | ✅ Alpine.js |
| Customer Top Links | ✅ Alpine.js |
| Mini Cart | ✅ Alpine.js |
| Newsletter Subscribe | ✅ Vanilla JS |
| Add to Cart (PDP) | ✅ Vanilla JS |
| Add to Cart (PLP) | ✅ Vanilla JS |
| Wishlist / Compare | ✅ Vanilla JS |
| Product Tabs | ✅ Alpine.js |
| Currency Switcher | ✅ Alpine.js |

> The goal is to replace legacy JavaScript with the smallest possible number of template overrides.

## Current status

<!-- badges.test.start -->
![Static Tests](https://img.shields.io/github/actions/workflow/status/LokiExtensions/LokiTheme_LumaComponents/static-tests.yml?label=static-tests)
![Unit Tests](https://img.shields.io/github/actions/workflow/status/LokiExtensions/LokiTheme_LumaComponents/unit-tests.yml?label=unit-tests)
![Integration Tests](https://img.shields.io/github/actions/workflow/status/LokiExtensions/LokiTheme_LumaComponents/integration-tests.yml?label=integration-tests)
![Playwright](https://img.shields.io/github/actions/workflow/status/LokiExtensions/LokiTheme_LumaComponents/playwright.yml?label=playwright)
![DI Compilation](https://img.shields.io/github/actions/workflow/status/LokiExtensions/LokiTheme_LumaComponents/compile.yml?label=compile)
<!-- badges.test.end -->

