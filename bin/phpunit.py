#!/usr/bin/python

import sys
import os

list_argument = sys.argv

var_first = int(list_argument[1])
var_second = int(list_argument[2])
var_third = list_argument[3]

if (var_first > 0):
    if (var_second > 0):
        var_command_test = "rm test.html && vendor/phpunit/phpunit/phpunit --filter %s >> test.html" % (var_third)
    else:
        var_command_test = "rm test.html && vendor/phpunit/phpunit/phpunit >> test.html"

    os.system(var_command_test)
    print "Access this to browser: file:///var/www/rush-estore/test.html"
    print "Test success"

else:
    if (var_second > 0):
        var_command_test = "vendor/phpunit/phpunit/phpunit --filter %s " % (var_third)
    else:
        var_command_test = 'vendor/phpunit/phpunit/phpunit'

    os.system(var_command_test)