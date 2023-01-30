# VAW (Vagrant Ansible WordPress) governed by Jankins

The **VAW (Vagrant Ansible WordPress)** is **Ansible playbooks** for website developer, designer, webmaster and WordPress theme/plugin developer.

Launch the development environment in Vagrant, you can build the website and verify the operation of the website. Of course, you can also develop WordPress themes and plugins.

The **VAW** is also a collaboration tool. You can take advantage of collaboration tool that share the environment with development partners, designers and clients.

VAW (Vagrant Ansible WordPress) documentation: [https://thingsym.github.io/vaw/](https://thingsym.github.io/vaw/)

## Features

### 1. Build OS, Server and Database environment

The **VAW** will build OS from **CentOS** or **Debian** or **Ubuntu**, server from **Apache** or **nginx** or **H2O**, and build database from **MariaDB** or **MySQL** or **Percona MySQL**.

On all web servers, FastCGI configuration is possible. Build PHP execution environment from **PHP-FPM** (FastCGI Process Manager).

By default, the server and the databese is installed in the default settings. Also you can edit configuration files.

You can validate on the server and the database of various combinations.

### 2. Build WordPress environment

The **VAW** will build a WordPress which has been processed in a variety of settings and data.

You can verify the test data or real data on WordPress. The VAW will realize building of WordPress synchronized with the data and files in the production environment.

* Install specified version WordPress Core
* Install WordPress Core in Your Language
* Install to specified directory, or subdirectory install
* Multisite support
* Administration Over SSL support
* Install theme
	* Automatic activate
	* Batch install multiple themes
	* Install the theme in the local path (developing theme and official directory unregistered theme support)
* Install plugin
	* Automatic activate
	* Batch install multiple plugins
	* Install the plugin in the local path (developing plugin and official directory unregistered plugin support)
* Setting theme_mod (theme modification value) and Options
* Setting permalink structure
* Importing data from any one of 4 ways
	* WordPress export (WXR) file
	* SQL file (database dump data)
	* Backup plugin "BackWPup" archive file (Zip, Tar, Tar GZip, Tar BZip2)
	* Theme Unit Test
* Automatically place wp-content directory
* Automatically place uploads directory
* Replacement to the URL of the test environment from the URL of the production environment
* Regenerate thumbnails

### 3. Develop & Deploy Tools

Pre-installing PHP version managment 'phpenv', Dependency Manager for PHP 'Composer', command-line tools for WordPress 'WP-CLI' and version control system 'Git' in the standard.

You can install the develop tools or the deploy tools by usage. See Specification for list of installed tools.

## Requirements

* [Oracle VM VirtualBox](https://www.virtualbox.org) >= 6.1
* [Vagrant](https://www.vagrantup.com) >= 2.2
* [Ansible](https://www.ansible.com) >= 2.9

#### Optional

* [mkcert](https://github.com/FiloSottile/mkcert)

### Vagrant plugin (optional)

* [vagrant-hostsupdater](https://github.com/cogitatio/vagrant-hostsupdater)
* [vagrant-vbguest](https://github.com/dotless-de/vagrant-vbguest)
* [vagrant-serverspec](https://github.com/jvoorhis/vagrant-serverspec)
