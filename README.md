# HyperLocal
The locally social app!


## 0. Setup
### 0.0 Setting Routes
1. Enable rewrite module in httpd.conf
```
LoadModule rewrite_module modules/mod_rewrite.so
```
2. And make sure *AllowOverride* is set to *All* for the directory
```
<Directory "${SRVROOT}/htdocs">
    Options Indexes FollowSymLinks
    AllowOverride All
    Require all granted
    ...
</Directory>
```
3. and the ```.htaccess``` file exist!
