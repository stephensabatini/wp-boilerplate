# WP Boilerplate

- Uses [Composer](https://getcomposer.org/) for managing PHP dependencies.
- Uses [npm](https://www.npmjs.com/) for managing our asset, compiler, and task runner dependencies.
- Uses [Gulp](https://gulpjs.com/) as a task runner.
- Uses [SCSS](https://sass-lang.com/) as a backend stylesheet language.
- Built-in automated optimization and processing of all assets.
- Adheres to the [WordPress Browser Support](https://make.wordpress.org/core/handbook/best-practices/browser-support/).
- Adheres to the [WordPress Coding Standards](https://github.com/WordPress/WordPress-Coding-Standards).
- Adheres to Automattic’s [VIP Coding Standards](https://github.com/Automattic/VIP-Coding-Standards).


![Support Level](https://img.shields.io/badge/support-beta-blueviolet.svg)
![WordPress Theme: Tested WP Version](https://img.shields.io/badge/wordpress-v5.4.1%20tested-brightgreen)
[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://github.com/stephensabatini/WP-Boilerplate/blob/master/LICENSE.md)
![GitHub stars](https://img.shields.io/github/stars/stephensabatini/WP-Boilerplate?style=social)


## Requirements

- [WordPress Requirements](https://wordpress.org/about/requirements/)
- [Supported PHP Versions](https://www.php.net/supported-versions.php)
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://nodejs.org/en/download/)


## Installation

### Overview

These instructions assume you have an understanding of the command-line interface and Git as this is where the boilerplate really shines.


### WordPress

If this is your first time setting up WordPress, head over to [How to Install WordPress](https://wordpress.org/support/article/how-to-install-wordpress/).


### Theme

There are many ways that this boilerplate theme can be installed but it is recommended that people **use this as a template and fork it** rather than use it as a parent theme of your child theme. The code maintained in this repository will always be geared towards providing the best boilerplate possible. That may also entail code-breaking changes to push the latest in technology. It is recommended that you use Git to then pull your new forked repository into your `/wp-content/themes` directory.


### Install Dependencies and Task Runner

```sh
npm run install:dev
```

## Scripts

### Running the Compilers, Linters, and Formatters

In this project, we use Node.js and Gulp to compile our assets and manage our dependencies.

`npm run start` - Runs all of the compiler tasks in parallel to build our production assets.  
`npm run watch` - Runs all of the watch tasks in parallel.  
`npm run watch:css` - Monitor `src/scss` directory and run sass task on change.  
`npm run watch:js` - Monitor `src/js` directory and run js task on change.  
`npm run watch:images` - Monitor `src/images` directory and run images task on change.  
`npm run build` - Runs all of the compiler tasks in parallel.  
`npm run build:css` - Compile SCSS from `src/scss` into CSS and concatenate files to `dist/index.css` and `dist/index.min.css`.  
`npm run build:js` - Compile JS from `src/js` and concatenate files to `script.js` and `script.min.js`.  
`npm run build:images` - Optimize any new images in the `src/images` directory to `dist/images`.  
`npm run install` - Install production dependencies and build the assets.  
`npm run install:prod` - An alias for `npm run install`. Preferable when using in scripts to improve clarity.  
`npm run install:dev` - Install development dependencies and build the assets.  
`npm run lint` - Runs all of the lint tasks in parallel.  
`npm run lint:css` - Lint the SCSS/CSS.  
`npm run lint:js` - Lint the JS.  
`npm run lint:php` - Lint the PHP. Alias of `composer run lint`.  
`npm run format` - Runs all of the format tasks in parallel.  
`npm run format:css` - Format the SCSS/CSS.  
`npm run format:js` - Format the JS.  
`npm run format:php` - Format the PHP. Alias of `composer run format:php`.  


#### Note About Linters

Linters are great tools used to push even better code, but remember there are exceptions to the rules. Be sure to document those exceptions where appropriate using [`phpcs:`](https://github.com/squizlabs/PHP_CodeSniffer/wiki/Advanced-Usage#ignoring-parts-of-a-file).


#### Note About Formatters

Although Formatters do a great job of automating a lot of the formatting they are not perfect. Please use this tool as a method to assist you in executing your responsibilities to push outstanding code but not as a method to solely rely on.


## Architecture

### General

`dist` - Where all of the assets are compiled and concatenated to.  
`includes` - This contains purely backend things such as configuration, hooks, filters, classes, helper/utility functions, etc.  
`includes/classes`  Any classes defined here are autoloaded using composer and are accessible across the theme.  
`languages` - Where the language files are stored.  
`node_modules` - This contains the Node.js dependencies.  
`partials` - This contains the presentational components.  
`partials/blocks` - This contains the editor blocks.  
`src` - Where all of the assets are stored.  
`templates` - This contains the page templates (or wrappers) to keep the root clean.  
`vendor` - This contains the PHP dependencies.


### SCSS

`src/scss/abstracts` - Where all global definitions for use across your SASS are defined.  
`src/scss/vendors` - Where all third-party SCSS/CSS is imported from.  
`src/scss/base` - Where all base styles such as HTML elements and style resets.  
`src/scss/layout` - Where all layout/section components are such as the Header, Navigation, Sidebar, Footer, and Forms.  
`src/scss/partials` - Mocks the structure of the `/partials` directory.  
`src/scss/partials/blocks` -   Mocks the structure of the `partials/blocks` directory.  
`src/scss/templates` -  Mocks the structure of the `templates` directory.


## Deployment

Run the following command to install all production dependencies and build the assets.

```sh
npm run install
```
