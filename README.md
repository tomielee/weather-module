WEATHER MODULE
==================================

A weather forecast works with Anax framework.
It is set up to use [darksky.net](https://darksky.net/). You have to have a valid api key.


Table of content
------------------------------------

* [Install as Anax module](#Install-as-Anax-module)
* [Configuration files](#Configuration-files)
* [Install using scaffold postprocessing file](#Install-using-scaffold-postprocessing-file)
* [Install and setup Anax](#Install-and-setup-Anax)
* [Dependency](#Dependency)




Install as Anax module
------------------------------------

This is how you install the module into an existing Anax installation.

Install using composer.

```
composer require jeneljenel/weather-module
```

Configuration files
-----------------------------------
Copy the needed configuration and setup the module as a route handler for the route `weather`.

**config, views**

```
rsync -av vendor/jeneljenel/weather-module/config ./
```
```
rsync -av vendor/jeneljenel/weather-module/view/weather ./view
```

**You have to create your own api.php file. Copy /config/api_sample.php**
```
$ cd config
$ cp api_sample.php api.php
$ nano config/api.php
```
enter a valid api_key, ctrl + x, Y and enter


Install using scaffold postprocessing file
------------------------------------

The module supports a postprocessing installation script, to be used with Anax scaffolding. The script executes the default installation, as outlined above.

```text
bash vendor/jeneljenel/weather-module/.anax/scaffold/postprocess.d/302_weather.bash
```

The postprocessing script should be run after the `composer require` is done.



Install and setup Anax 
------------------------------------

You need a Anax installation, before you can use this module. You can create a sample Anax installation, using the scaffolding utility [`anax-cli`](https://github.com/canax/anax-cli).

Scaffold a sample Anax installation `anax-site-develop` into the directory `me`.

```
$ anax create me anax-site-develop
$ cd me
```

Point your webserver to `me/htdocs` and Anax should display a Home-page.



Dependency
------------------

This is a Anax modulen and primarly intended to be used together with the Anax framework.


License
------------------

This software carries a MIT license. See [LICENSE.txt](LICENSE.txt) for details.



```
Copyright (c) 2019 Tomie Lee
```