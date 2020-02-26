# Installation wizard for October

The wizard installation is a recommended way to install October. It is simpler than the command-line installation and doesn't require any special skills.

1. Prepare a directory on your server that is empty. It can be a sub-directory, domain root or a sub-domain.
1. [Download the installer archive file](https://github.com/octobercms/install/archive/master.zip).
1. Unpack the installer archive to the prepared directory.
1. Grant writing permissions on the installation directory and all its subdirectories and files.
1. Navigate to the install.php script in your web browser.
1. Follow the installation instructions.

## Minimum System Requirements

October CMS has a few system requirements:

* PHP version 7.0.8 or higher
* PDO PHP Extension
* cURL PHP Extension
* OpenSSL PHP Extension
* Mbstring PHP Library
* ZipArchive PHP Library
* GD PHP Library

As of PHP 5.5, some OS distributions may require you to manually install the PHP JSON extension.
When using Ubuntu, this can be done via ``apt-get install php5-json``.

### Temporary .htaccess

```
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteRule ^install\.php$ - [L]
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . /install.php [L]
</IfModule>
```

### /etc/apache2/sites-available/october-moodle.site.conf

```
<VirtualHost *:80>
        #DirectoryIndex install.php
        ServerAdmin admin@october-moodle.site
        ServerName october-moodle.site
        ServerAlias www.october-moodle.site
        DocumentRoot /var/www/html/october-moodle
        <Directory "/var/www/html/october-moodle/">
                Options Indexes FollowSymLinks
                AllowOverride all
                Require all granted
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/error.log
        CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```
