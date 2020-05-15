# MyOnlineStore Coding Standard

## Install
Install the package with composer:
```bash
composer require myonlinestore/coding-standard --dev
```

## Configure
Add the ruleset to your `phpcs.xml.dist` file:
```xml
<?xml version="1.0"?>
<ruleset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="vendor/squizlabs/php_codesniffer/phpcs.xsd"
>
    <arg name="basepath" value="."/>
    <arg name="extensions" value="php"/>
    <arg name="parallel" value="80"/>
    <arg name="cache" value=".phpcs-cache"/>
    <arg name="colors"/>
    <arg value="nps"/>

    <file>src</file>
    <file>tests</file>

    <rule ref="MyOnlineStore"/>
</ruleset>

```

## Unused Doctrine fields
If your code has entities with fields without accessors, you could disable the
unused elements inspection:
```xml
<rule ref="MyOnlineStore">
    <exclude name="SlevomatCodingStandard.Classes.UnusedPrivateElements"/>
</rule>
```
