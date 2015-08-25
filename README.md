#Plato Creative - SilverStripe Installer#
####A custom installer for a SilverStripe based project, includes commonly used files and settings.####

### Requirements ###
This script requires you have the following installed:
- Compass
- Foundation cli
- Bundle

### Usage ###
Use composer to quickly create a new project:
- `composer create-project plato-creative/plato-silverstripe-installer . @dev`
Once the porject is created run:
- `composer install`

###Process:###
When `composer install` is executed composer loads the PlatoCreative installer class and works through it's logic.
It firstly asks the user for some site settings e.g. theme name and then it will attempt to download and install the Foundation framework using the foundation cli. 

Once foundation is installed the script moves and renames a few folders.
Sass files will be compiled using `bundle exec compass watch` or if there no Gemfile then it will simply run `composer install`.

### Contributing ###
