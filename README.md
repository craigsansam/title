# Radiula Title

[![Build Status](https://travis-ci.org/radiula/title.svg)](https://travis-ci.org/radiula/title)
[![Latest Stable Version](https://poser.pugx.org/radiula/title/v/stable.svg)](https://packagist.org/packages/radiula/title)
[![Total Downloads](https://poser.pugx.org/radiula/title/downloads.svg)](https://packagist.org/packages/radiula/title)
[![Latest Unstable Version](https://poser.pugx.org/radiula/title/v/unstable.svg)](https://packagist.org/packages/radiula/title) [![License](https://poser.pugx.org/radiula/title/license.svg)](https://packagist.org/packages/radiula/title)

## Install

Pull this package in through Composer.

    {
        "require": {
        "radiula/title": "~0.4"
    }



Add the following to you `config/app.php`

    'providers' => [
        '...',
        'Radiula\Title\TitleServiceProvider'
    ];

    'aliases' => [
        '...',
        'Title' => 'Radiula\Title\Facades\Title',
    ];


## Usage
#### Set the site title

    Title::siteName('Acme Site');

#### Set one or more segments

    Title::segment('Foo', 'Bar');

#### Make the title

    Title::make();

#### Overriding the layout

    Title::layout('%s - %s');


Running the `siteName` and `segment` methods with the above properties (and the default layout), would cause `make` to output the following

    Foo | Bar | Acme Site
