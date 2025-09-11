# `Loki_Theme` module
**Module for Magento 2 to remove legacy Luma JavaScript and adds JS components or Alpine.js components where needed**

## Installation
```bash
composer require loki/magento2-theme
bin/magento module:enable Loki_Theme
```

## What this is
This module removes legacy Luma JavaScript (RequireJS, Knockout.js, jQuery, jQuery UI) and replaces it with custom JavaScript where needed.

Currently, the following components are built-in:

- Messages
- Cookie notice
- Top navigation
- Top links (customer welcome)
- Minicart
- Newsletter subscribe
- Add-to-cart (product page)
- Add-to-cart (category page)
- Tabs (product page)

Make sure to carefully read the docs at [https://loki-extensions.com/docs/theme](https://loki-extensions.com/docs/theme)

