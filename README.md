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
* AllowOverride All

> php.ini
* Posix
* pcntl



## Notice / Reference

\[1\] ECharts: A Declarative Framework for Rapid Construction of Web-based Visualization
- Deqing Li,Honghui Mei, Yi Shen, Shuang Su, Wenli Zhang, Junting Wang, Ming Zu, Wei Chen.

[2] Fly.js

* https://github.com/wendux/fly

  

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
