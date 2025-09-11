# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [0.0.6] - 11 September 2025
### Fixed
- Fix messages not being fetched when FPC is enabled
- Fix inline block

## [0.0.5] - 11 September 2025
### Fixed
- Add LokiCookies API and cookie notice
- Add top links component
- Add-to-cart for both PDP and PLP
- Add any layout handle with `loki_theme_` prefix
- Reuse `loki.alpinejs` block name
- Obviously remove mage/calendar.css
- Only add component definitions once
- Update README

## [0.0.4] - 10 September 2025
### Fixed
- Add minicart

## [0.0.3] - 10 September 2025
### Fixed
- Remove additional legacy JS in checkout
- Prevent error when message is already removed
- Add dep with CSP

## [0.0.2] - 10 September 2025
### Fixed
- Refactor API for messages and add timeout
- Rewrite messages from Alpine.js component to plain JS component
- Turn single click to remove message into double click
- Add icons to message
- Failsafe to prevent error
- Highlight selected menu
- Alpine.js component for main navigation menu
- Move component logic from Loki/luma to `Loki_Theme`
- Conditionally apply layout handles
- Move theme config to separate config class
- Move Alpine CSP and JS removal via layout to `Loki_Theme` module
- Move component definitions from constructor to DI XML
- Move patterns and themes into DI XML
- Only add x-title and HTML hints in Developer Mode
- Only apply to configured themes
- Remove require() script
- Adding all files to git via Yireo Command

## [0.0.1] - 2 September 2025
### Added
- Initial release
