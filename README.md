# CI-Installer

CI-Installer makes it possible to modify the minimum variables to the good functioning of CodeIgniter in a simple and fast way.
All files present are the originals of the version of CodeIgniter 3.1.10.

This script allows you to modify the following variables:
- Base Site URL >> $config['base_url']
- Index File >> $config['index_page']
- creating the htaccess file to enable the mod_rewrite if deleting the index.php in the URL
- Database values with test connection
	- hostname
	- username
	- password
	- database
	- dbprefix

For the .htaccess file, if it exists, the script will not modify the existing one. It will be necessary in this case to edit manually (for now ...).

## TODO
* Deleting all files after the installation is complete
* Other features will arrive soon ...

## Demo
You can see the demo that online at this address: https://demo.domprojects.com/ci-installer/

![Screenshot](https://demo.domprojects.com/ci-installer/screenshot/screenshot.png)