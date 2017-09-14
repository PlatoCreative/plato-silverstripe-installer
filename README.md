# Plato Creative - SilverStripe Installer #
A custom installer for a SilverStripe based project, includes commonly used files and settings.

### Requirements ###
This installer requires you have the following:
- Composer
- NPM/nodeJS

### Installation ###
1. Use composer to quickly create a new project:
```
composer create-project plato-creative/plato-silverstripe-installer . @dev
```
2. Install node modules via npm:
```
npm install
```
3. Compile SCSS & Javascript
```
npm run prod
```

### Compiling Tips ###
There are 3 default commands you can run:
2. `npm run watch` - this will compile like above but keep watching for changes.
3. `npm run prod` - this will compile all files with compression and all sorts or other goodies. And exclude and logs.

#### Tests via PHPUnit ####
To run PHPUnit and tests use:
```cli
vendor/bin/phpunit
```
Edit phpunit.xml to change default configuration.
