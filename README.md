# MyOnlineStore Coding Standard

## Install

Install the package with composer:
```bash
composer require myonlinestore/coding-standard
```

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
    <arg value="sp"/>

    <file>src</file>
    <file>tests</file>

    <rule ref="vendor/myonlinestore/coding-standard/MyOnlineStore/ruleset.xml"/>
</ruleset>
```


## Monolith Excludes
```xml
<exclude name="SlevomatCodingStandard.Commenting.RequireOneLinePropertyDocComment"/>
```
