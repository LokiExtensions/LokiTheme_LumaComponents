# `Loki_Theme` module
**Module for Magento 2 to remove legacy Luma JavaScript and adds JS components or Alpine.js components where needed**

## Installation
```bash
composer require loki/magento2-theme
bin/magento module:enable Loki_Theme
```

## What this is
This module removes legacy Luma JavaScript (RequireJS, Knockout.js, jQuery, jQuery UI) and replaces it with custom JavaScript where needed. The following variations for this rewrite exist - taking in mind that this module tries to make as little template override as possible:

- No JavaScript, just plain HTML and CSS;
- Simple JavaScript functions;
- Alpine.js components (with or without custom template);

Currently, the following components are built-in:

- Messages
- Cookie notice
- Top navigation
- Mobile navigation
- Top links (customer welcome)
- Minicart
- Newsletter subscribe
- Add-to-cart (product page)
- Add-to-cart (category page)
- Tabs (product page)
- Currency switcher

Make sure to carefully read the docs at [https://loki-extensions.com/docs/theme](https://loki-extensions.com/docs/theme)

