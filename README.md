![stability mature](https://img.shields.io/badge/stability-mature-008000.svg)
[![latest tag](https://img.shields.io/packagist/v/d3/attributemultivalues?label=release)](https://packagist.org/packages/d3/attributemultivalues)
![License](https://img.shields.io/packagist/l/d3/attributemultivalues)

# Multiple value assignment to attributes

This package supports the multiple assignment of attribute values. This allows you to describe your articles in more detail and offer more flexible filters.

Instead of 
* Colour: yellow
* Material: cotton

you can now maintain further details:
* Color: yellow
* Colour: black
* Material: cotton
* Material: Polyester

These additional filter options can be used in our [advanced search](https://packagist.org/packages/d3/extsearch) module, for example.

## Install

Run this composer statement in your shop. Adjust this command if your installation requires it.

```
composer require d3/attributemultivalues [--update-no-dev]
```

Apply required patch:

```
composer require cweagans/composer-patches;
composer config --json extra.patches.oxid-esales/oxideshop-ce '{"add multi assignment to article attribute ajax template - 2020-02-25-1": "https://git.d3data.de/D3Public/AttributeMultiValues/raw/branch/rel_2.x/patches/article_attribute_ajax.patch"}'
rm -rf vendor/oxid-esales/oxideshop-ce
composer install
composer update --lock  // confirm overwriting oxideshop-ce files
```