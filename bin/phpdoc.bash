php $PWD/bin/phpdoc.phar -d $PWD/app/ -t $PWD/docs/html/
php $PWD/bin/phpdoc.phar -d $PWD/app/ -t $PWD/docs/ --template="xml"
php $PWD/vendor/evert/phpdoc-md/bin/phpdocmd $PWD/docs/structure.xml $PWD/docs/md
