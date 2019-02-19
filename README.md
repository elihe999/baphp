# baphp
simple frame

1\. Download

2\. Configure your webserver.

For *Apache*, edit your `.htaccess` file with the following:
```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

> httpd.conf
 AllowOverride All

> php.ini



## frame workflow
```flow
st=>start: enter
e=>end: return value
df=>subroutine: defind
im=>subroutine: import
at=>subroutine: autoload
cr=>subroutine: create framework
ro=>subroutine: route map
ld=>subroutine: load controller
st->df->im->at->cr->ro->ld->e


```
