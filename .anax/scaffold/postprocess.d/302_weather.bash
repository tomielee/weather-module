#!/usr/bin/env bash
#
# jeneljenel/weather-module
#
# Integrate the weather module onto existing anax installation.
#

# Copy the configuration files
rsync -av vendor/jeneljenel/weather-module/config ./
rsync -av vendor/jeneljenel/weather-module/src/Weather ./src
rsync -av vendor/jeneljenel/weather-module/view/weather ./view

