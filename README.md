# Acme Shipping Method



## Requirements

This plugin requires Craft CMS 4.4.5 or later, and PHP 8.0.2 or later.

## Installation

You can install this plugin from the Plugin Store or with Composer.

#### From the Plugin Store

Go to the Plugin Store in your project’s Control Panel and search for “Acme Shipping Method”. Then press “Install”.

#### With Composer

Open your terminal and run the following commands:

```bash
# go to the project directory
cd /path/to/my-project.test

# clone the repository to /plugins
git clone https://github.com/MadMikeyB/craft-commerce-acme-shipping-method.git
```
Add the repository as a PATH repo by adding the below to 

```json
    "repositories": [
        {
            "type": "path",
            "url": "plugins/acme-shipping-method"
        }
    ]
```

```bash
# tell Composer to load the plugin
composer require acme-inc/craft-acme-shipping-method

# tell Craft to install the plugin
./craft plugin/install acme-shipping-method
```
