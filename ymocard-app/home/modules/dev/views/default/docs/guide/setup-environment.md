[Back](/docs)

Setup Environment Project
===============================

Pre-requesites
-------------

Git

Composer

Webserver (Apache + PHP + MySQL)

IDE (PHPStorm, Netbeans, Eclipse, others compatible with PHP)

SVN Client ( Tortoise, SVN for unix\linux)

Windows
-------

* [Git](http://git-scm.com/download/win)

* [Composer](https://getcomposer.org/doc/00-intro.md)

* [Xampp](https://www.apachefriends.org/download.html)

* [PHPStorm](http://www.jetbrains.com/phpstorm/download/)

* [Tortoise Client SVN](http://tortoisesvn.net/downloads.html)

Linux\Unix
-----------

* [Git](http://git-scm.com/download/linux)

Osx
---

* [Git](http://git-scm.com/download/mac)

* [Subversion](http://gigaom.com/2009/02/23/12-subversion-apps-for-os-x/)

Create Virtual Hosts
--------------------

From Ymobiz
-----------

```
<VirtualHost *:80>
ServerName ymobiz.dev
DocumentRoot "path/ymobiz"
</VirtualHost>

<VirtualHost *:80>
ServerName backoffice.ymobiz.dev
DocumentRoot "path/ymobiz/backoffice/web"
</VirtualHost>

<VirtualHost *:80>
ServerName business.ymobiz.dev
DocumentRoot "path/ymobiz/business/web"
</VirtualHost>

<VirtualHost *:80>
ServerName marketing.ymobiz.dev
DocumentRoot "path/ymobiz/marketing/web"
</VirtualHost>

<VirtualHost *:80>
ServerName network.ymobiz.dev
DocumentRoot "path/ymobiz/network/web"
</VirtualHost>
```

From Ymocard
------------

```
<VirtualHost *:80>
ServerName ymocard.dev
DocumentRoot "path/ymocard"
</VirtualHost>

<VirtualHost *:80>
ServerName backoffice.ymocard.dev
DocumentRoot "path/ymocard/backoffice/web"
</VirtualHost>
```

Setup Virtual Hosts in host file (C:\Windows\System32\drivers\etc\hosts)
------------------------------------------------------------------------

From Ymobiz
-----------

```
127.0.0.1           ymobiz.dev
127.0.0.1           backoffice.ymobiz.dev
127.0.0.1           business.ymobiz.dev
127.0.0.1           marketing.ymobiz.dev
127.0.0.1           network.ymobiz.dev
```

From Ymocard
-----------

```
127.0.0.1           ymocard.dev
127.0.0.1           backoffice.ymocard.dev
```



