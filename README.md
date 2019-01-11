# MyOnlineStore Coding Standard

## Install

Install the package with composer:
```bash
composer require myonlinestore/coding-standard
```

Add the ruleset to your `phpcs.xml.dist` file:
```xml
<?xml version="1.0"?>
<ruleset
        name="MyOnlineStore"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="vendor/squizlabs/php_codesniffer/phpcs.xsd"
>
    <rule ref="vendor/myonlinestore/coding-standard/MyOnlineStore/ruleset.xml"/>
</ruleset>
```
