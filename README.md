#Plato Creative - SilverStripe Installer#
####A custom installer for a SilverStripe based project, includes commonly used files and settings.####

Run `composer install` and you will all dependencies will be downloaded and you will also be prompted to answer a few questions e.g. theme name and databased details.

This script requires you have the following installed:
- Compass
- Foundation cli
- Bundle

####What it does:####
When `composer install` is executed composer loads the PlatoCreative installer class and works through it's logic.
It firstly asks the user for some site settings e.g. theme name and then it will attempt to download and install the Foundation framework using a cli. 
Once foundation is installed the script moves and renames a few folders and then compiles the Sass using `bundle exec compass watch` or if there no Gemfile then it will simply run `composer install`.
