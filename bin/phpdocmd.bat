@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../vendor/evert/phpdoc-md/bin/phpdocmd
php "%BIN_TARGET%" %*
