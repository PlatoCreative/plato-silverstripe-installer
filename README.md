#Plato Creative - SilverStripe Installer#
####A custom installer for a SilverStripe based project, includes commonly used files and settings.####

### Requirements ###
This script requires you have the following installed:
- Composer
- Bower
- Compass
- Foundation cli
- Bundle

### Usage ###
Use composer to quickly create a new project:
- `composer create-project plato-creative/plato-silverstripe-installer . 3.2.*`

Once the project is created run:
- `composer install`

###Process:###
When `composer install` is executed composer loads the PlatoCreative installer class and works through it's logic.
It firstly asks the user for some site settings e.g. theme name and database name.
It then asks if you are building a custom website or want to base it from a pre-build theme and modules. If you choose to use the base then you will get some basic styles and layout and a few pre-built modules. If you choose custom then you will get a fresh foundation install and limited setup.

The base theme adds the following modules:
- [Plato's Home page slides module](https://github.com/PlatoCreative/plato-silverstripe-homeslides)
- [Plato's Home page tiles module](https://github.com/PlatoCreative/plato-silverstripe-hometiles)
- [Plato's Gallery module](https://github.com/PlatoCreative/plato-silverstripe-gallery)
- [Plato's Banner module](https://github.com/PlatoCreative/plato-silverstripe-banners)
- [Plato's Page section module](https://github.com/PlatoCreative/plato-silverstripe-sections)
