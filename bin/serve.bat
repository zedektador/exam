@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../public
php -S localhost:8000 -t "%BIN_TARGET%"