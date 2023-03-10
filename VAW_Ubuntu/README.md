# VAW (Vagrant Ansible WordPress)

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

## Usage

### 1. Install Virtualbox

Download the VirtualBox form [www.virtualbox.org](https://www.virtualbox.org) and install.


### 2. Install Vagrant

Download the Vagrant form [www.vagrantup.com](https://www.vagrantup.com) and install.

### 3. Download Ansible playbooks of the VAW

Download a Vagrantfile and Ansible playbooks from the following link.

[Releases page](https://github.com/thingsym/vaw/releases)

### 4. Generate SSL certificate files using mkcert

Install mkcert. See [https://github.com/FiloSottile/mkcert](https://github.com/FiloSottile/mkcert)

	cd vaw-x.x.x
	mkcert -install
	mkdir mkcert
	cd mkcert
	mkcert -cert-file cert.pem -key-file privkey.pem <vm_hostname>

### 5. Launch a virtual environment

	cd vaw-x.x.x
	vagrant up

If you don't have a Box at first, begins from the download of Box.
After provisioning, you can launch a WordPress development environment.

Note: Passwordless for Vagrant::Hostsupdater. See [Suppressing prompts for elevating privileges
](https://github.com/agiledivider/vagrant-hostsupdater#suppressing-prompts-for-elevating-privileges)

### 6. Access to the website and the WordPress Admin

Access to the website **http://vaw.local/**. Access to the WordPress admin **http://vaw.local/wp-admin/**.

### 7. Access to a Vagrant machine via SSH

	vagrant ssh

Or using ssh config.

	vagrant ssh-config > ssh_config.cache
	ssh -F ssh_config.cache default

## Default configuration Variables

ID and password for the initial setting is as follows. Can be set in the provisioning configuration file.

#### Database

* ROOT USER `root`
* ROOT PASSWORD `admin`
* HOST `localhost`
* DATABASE NAME `wordpress`
* USER `admin`
* PASSWORD `admin`

#### WordPress Admin

* USER `admin`
* PASSWORD `admin`

## Customize Options

You can build a variety of environment that edit configuration files of the VAW.

There are two configuration files you can customize.

* Vagrantfile
* group_vars/all.yml

Run `vagrant up` or `vagrant provision`, after editing the configuration files.

### Vagrant configuration file (Ruby)

Vagrant configuration file is **Vagrantfile**.

Vagrantfile will set the vagrant Box, private IP address, hostname and the document root.

If you launch multiple environments, change the name of the directory. Should rewrite `vm_ip` and `vm_hostname`. Note not to overlap with other environments.

You can accesse from a terminal in the same LAN to use the public network to Vagrant virtual environment. To use public networks, set IP address for bridged connection to `public_ip`. In that case, recommended that configure the same IP address to `vm_hostname`.

	## Vagrant Settings ##
	vm_box                = 'centos/7'
	vm_box_version        = '>= 0'
	vm_ip                 = '192.168.56.49'
	vm_hostname           = 'vaw.local'
	vm_document_root      = '/var/www/html'

	public_ip             = ''

	forwarded_port        = [
		3000,
		3001,
		1025,
		8025
	]

	vbguest_auto_update   = true
	synced_folder_type    = 'virtualbox' # virtualbox|nfs|rsync|smb

	backup_database       = false

	ansible_install_mode  = :default    # :default|:pip
	ansible_version       = 'latest'    # only :pip required

	provision_mode        = 'all'       # all|wordpress|box

	vagrant_plugins       = [
		'vagrant-hostsupdater',
		'vagrant-vbguest',
		'vagrant-serverspec'
	]

* `vm_box` (required) name of Vagrant Box (default: `centos/7`)
* `vm_box_version` (required) version of Vagrant Box (default: `>= 0`)
* `vm_ip` (required) private IP address (default: `192.168.46.49`)
* `vm_hostname` (required) hostname (default: `vaw.local`)
* `vm_document_root` (required) document root path (default: `/var/www/html`)
	* auto create `wordpress` directory and synchronized
* `public_ip` IP address of bridged connection (default: `''`)
* `forwarded_port` list of ports that you want to transfer (default: `[ 3000, 3001, 1025, 8025 ]`)
	* 3000: Browsersync auto-detected port
	* 3001: Browsersync ui port
	* 1025: MailHog SMTP default port
	* 8025: MailHog HTTP default port
* `vbguest_auto_update` whether to update VirtualBox Guest Additions (default: `true` / value: `true` | `false`)
???????????? (default: `true` / value: `true` | `false`)
* `synced_folder_type` the type of synced folder (default: `virtualbox` / value: `virtualbox` | `nfs` | `rsync` | `smb`)
* `backup_database` enable auto database backup when vagrant destroy or halt (default: `false` / value: `true` | `false`)
* `ansible_install_mode` (required) the way to install Ansible (default: `:default` / value: `:default` | `:pip`)
* `ansible_version` version of Ansible to install (default: `latest`)
* `provision_mode` (required) Provisioning mode (default: `all` / value: `all` | `wordpress` | `box`)
* `vagrant_plugins` install vagrant plugins

### Provisioning configuration file (YAML)

Provisioning configuration file is **group_vars/all.yml**.

In YAML format, you can set server, database and WordPress environment. And can enable the develop and deploy tools.

	## Server & Database Settings ##

	server             : apache   # apache|nginx|h2o
	fastcgi            : none     # none|php-fpm

	database           : mariadb  # mariadb|mysql|percona
	db_root_password   : admin

	db_host            : localhost
	db_name            : wordpress
	db_user            : admin
	db_password        : admin
	db_prefix          : wp_
	db_charset         : ''
	db_collate         : '' # utf8mb4_general_ci

	## WordPress Settings ##

	title              : VAW (Vagrant Ansible WordPress)
	admin_user         : admin
	admin_password     : admin
	admin_email        : hoge@example.com

	# e.g. latest, nightly, 4.1, 4.1-beta1
	# see Release Archive - https://wordpress.org/download/release-archive/
	# 3.7 or later to work properly
	version            : latest

	# e.g. en_US, ja, ...
	# see wordpress-i18n list - http://svn.automattic.com/wordpress-i18n/
	lang               : en_US

	# in own directory or subdirectory install.
	# see http://codex.wordpress.org/Giving_WordPress_Its_Own_Directory
	wp_dir             : ''   #e.g. /wordpress
	wp_site_path       : ''   #e.g. /wordpress

	multisite          : false   # true|false

	# default theme|slug|url|zip (local path, /vagrant/themes/*.zip)
	activate_theme     : ''
	themes             : []

	# slug|url|zip (local path, /vagrant/plugins/*.zip)
	activate_plugins   :
	                        - theme-check
	                        - log-deprecated-notices
	                        - debug-bar
	                        - query-monitor
	                        - broken-link-checker
	plugins            :
	                        - developer
	                        - monster-widget
	                        - wordpress-beta-tester
	                        - wp-multibyte-patch

	theme_mod          : {}

	# see Option Reference - http://codex.wordpress.org/Option_Reference
	options            : {}

	# e.g. /%year%/%monthnum%/%postname%
	# see http://codex.wordpress.org/Using_Permalinks
	permalink_structure  :
	                      structure   : ''
	                      category    : ''
	                      tag         : ''

	# Any one of 4 ways to import
	import_xml_data    : ''   # local path, /vagrant/import/*.xml
	import_db_data     : ''   # local path, /vagrant/import/*.sql
	import_backwpup    :
	                      path          : ''   # local path, /vagrant/import/*.zip
	                      db_data_file  : ''
	                      xml_data_file : ''
	import_admin       : false   # true|false
	theme_unit_test    : false   # true|false

	replace_old_url         : [] # http(s)://example.com, to vm_hostname from old url
	search_replace_strings  : {}
	regenerate_thumbnails   : false   # true|false

	WP_DEBUG           : true   # true|false
	SAVEQUERIES        : true   # true|false

	## Develop & Deploy Settings ##

	ssl                : true   # true|false
	http_protocol      : https   # http|https

	# See Supported Versions http://php.net/supported-versions.php
	php_version        : 7.4.14

	develop_tools      : false   # true|false
	deploy_tools       : false   # true|false

	## That's all, stop setting. Let's vagrant up!! ##

	WP_URL             : '{{ http_protocol }}://{{ HOSTNAME }}{{ wp_site_path }}'
	WP_PATH            : '{{ DOCUMENT_ROOT }}{{ wp_dir }}'


#### Server & Database Settings ##

* `server` (required) name of web server (default: `apache` / value: `apache` | `nginx` | `h2o`)
* `fastcgi` name of fastCGI (default: `none` / value: `none` | `php-fpm`)
* `database` (required) name of databese (default: `mariadb` / value: `mariadb` | `mysql` | `percona`)
* `db_root_password` (required) database root password (default: `admin`)
* `db_host` (required) database host (default: `localhost`)
* `db_name` (required) name of database (default: `wordpress`)
* `db_user` (required) database user name (default: `admin`)
* `db_password` (required) database user password (default: `admin`)
* `db_prefix` database prefix (default: `wp_`)
* `db_charset` database character set (default: `''`)
* `db_collate` database collation (default: `''`)

#### WordPress Settings ##

* `title` WordPress site title (default: `VAW (Vagrant Ansible WordPress)`)
* `admin_user` (required) WordPress admin user name (default: `admin`)
* `admin_password` (required) WordPress admin user password (default: `admin`)
* `admin_email` (required) WordPress admin email address (default: `hoge@example.com`)
* `version` (required) version of WordPress (default: `latest`)
	* e.g. `latest`, `4.1`, `4.1-beta1`
	* see [Release Archive](https://wordpress.org/download/release-archive/)
	* version 3.7 or later to work properly
* `lang` (required) WordPress in your language (default: `en_US`)
	* e.g. `en_US`, `ja`, ...
	* see [wordpress-i18n list](http://svn.automattic.com/wordpress-i18n/)

* `wp_dir` directory path to subdirectory install WordPress (default: install to document root)
* `wp_site_path` path of site (default: document root)
	* If `wp_dir` and `wp_site_path` are the same path, in own directory install.
	* If `wp_dir` and `wp_site_path` are different path, install to subdirectory. Note that `wp_site_path` be placed on one above the directory than `wp_dir`.
	* see [Giving WordPress Its Own Directory](http://codex.wordpress.org/Giving_WordPress_Its_Own_Directory)

* `multisite` Multisite enabled flag (default: `false` / value: `true` | `false`)
* `activate_theme` install a theme and activated (default: default theme)
	* set default theme `''`, `theme slug`, `zip file URL` or  `local zip file path`
	* set `/vagrant/themes/*.zip` by local zip file path
* `themes` install themes
	* set in YAML arrays of hashes format `theme slug`, `zip file URL` or `local zip file path`
	* set `/vagrant/themes/*.zip` by local zip file path

Configuration example

	themes             :
	                     - yoko
	                     - Responsive

Disable the setting case

	themes             : []

* `activate_plugins` install plagins and activated
	* set in YAML arrays of hashes format `plagin slug`, `zip file URL` or `local zip file path`
	* set `/vagrant/plagins/*.zip` by local zip file path

Configuration example

	activate_plugins   :
	                        - theme-check
	                        - plugin-check

Disable the setting case

	activate_plugins   : []

* `plugins` install plagins
	* set in YAML arrays of hashes format `plagin slug`, `zip file URL` or `local zip file path`
	* set `/vagrant/plagins/*.zip` by local zip file path

* `theme_mod` setting theme_mod (theme modification value)
	* see [set_theme_mod()](http://codex.wordpress.org/Function_Reference/set_theme_mod)
	* set in YAML nested hash format

Configuration example

	theme_mod          :
	                       background_color: 'cccccc'

Disable the setting case

	theme_mod          : {}

* `options` setting options
	* see [update_option()](http://codex.wordpress.org/Function_Reference/update_option) and [Option Reference](http://codex.wordpress.org/Option_Reference)
	* set in YAML nested hash format

Configuration example

	options            :
	                       blogname: 'blog title'
	                       blogdescription: 'blog description'

Disable the setting case

	options            : {}

* `permalink_structure` setting permalink structure
	* set the following three permalink structures
	* see [Using Permalinks](http://codex.wordpress.org/Using_Permalinks)
	* `structure` set the permalink structure using the structure tags
	* `category` set the prefix of the category archive
	* `tag` set the prefix of the tag archive
* `import_xml_data` local WordPress export (WXR) file path `/vagrant/import/*.xml`
* `import_db_data` local sql dump file path `/vagrant/import/*.sql`
* `import_backwpup`
	* `path` Archive file path `/vagrant/import/*.zip` (Zip, Tar, Tar GZip, Tar BZip2)
	* `db_data_file` DB backup file name (Import from one of data files)
	* `xml_data_file` XML export file name (imported from one of the data files)
* `import_admin` Add WordPress administrator user (default: `false` / value: `true` | `false`)
* `theme_unit_test` import Theme Unit Test data enabled flag (default: `false` / value: `true` | `false`)
* `replace_old_url` replace to `vm_hostname` from `old url`

Configuration example

	replace_old_url         :
	                           - http://example.com
	                           - http://www.example.com
	                           - https://example.com

Disable the setting case

	replace_old_url         : []

* `search_replace_strings` Search the database and replace the matched string

Configuration example

	search_replace_strings  :
	                           'foo': 'bar'
	                           'abc': 'xyz'
	                           'Hello, World!': 'Welcome to WordPress!'

Disable the setting case

	search_replace_strings  : {}

* `regenerate_thumbnails` regenerate thumbnails enabled flag (default: `false` / value: `true` | `false`)
* `WP_DEBUG` debug mode (default: `true` / value: `true` | `false`)
* `SAVEQUERIES` save the database queries (default: `true` / value: `true` | `false`)

#### Develop & Deploy Settings ##

* `ssl` WordPress administration over SSL enabled flag (default: `true` / value: `true` | `false`)
* `http_protocol` HTTP protocol (default: `https` / value: `http` | `https`)
* `php_version` version of PHP (default: `7.4.14`)
* `develop_tools` activate develop tools (default: `false` / value: `true` | `false`)
* `deploy_tools` activate deploy tools (default: `false` / value: `true` | `false`)

## Directory Layout

Directory structure of the VAW is as follows.

This directory synchronize to the guest OS side `/vagrant`. `wordpress` creates automatically and synchronize to `vm_document_root`.

`wp-content` is a directory that stores WordPress themes, plugins, and upload files. `wp-content` will be placed automatically in WordPress which was built at the time of provisioning, if you place `wp-content` in this directory from the production environment.

`uploads` is a directory where stored upload files in `wp-content` directory of WordPress. `uploads` will be placed automatically in WordPress which was built at the time of provisioning, if you place `uploads` in this directory from the production environment.

You can create the same environment as the production environment, when you build a wordpress by import database dump data, substitution of url, regeneration of thumbnail image. You can set all from the provisioning configuration file.

### Full Layout

* backup (stores backup file. create automatically at running script, if it does not exist.)
* command (stores shell script)
* config (stores Custom Config)
* config.sample (sample Custom Config)
* group_vars (stores the provisioning configuration file of Ansible)
	* all.yml (provisioning configuration file)
* hosts
	* local (inventory file)
* import (stores import data, if necessary)
* LICENSE (license file)
* plugins (stores WordPress plugin zip format files, if necessary)
* mkcert (stores SSL certificate files)
* Rakefile (Rakefile of ServerSpec)
* README-ja.md
* README.md
* roles (stores Ansible playbook of each role)
* site.yml (Ansible playbook core file)
* spec (stores ServerSpec spec file)
	* box
	* localhost
	* spec_helper.rb
	* sync-dir
* themes (stores WordPress theme zip format files, if necessary)
* uploads (uploads directory in the wp-content)
* Vagrantfile (Vagrant configuration file)
* wordpress (synchronize to the Document Root. create automatically at `vagrant up`, if it does not exist.)
* wp-content (WordPress's wp-content directory)

### Minimum Layout

The VAW will be built in the directory structure of the following minimum unit.

* group_vars (stores the provisioning configuration file of Ansible)
	* all.yml (provisioning configuration file)
* hosts
	* local (inventory file)
* roles (stores Ansible playbook of each role)
* site.yml (Ansible playbook core file)
* Vagrantfile (Vagrant configuration file)
* wordpress (synchronize to the Document Root. create automatically at `vagrant up`, if it does not exist.)


## Vagrant Box

The VAW supports VirtualBox for providers of Vagrant. Operating system supported CentOS, Debian and Ubuntu Boxes. OS architecture supported x86_64. Details are as follows:

### CentOS

* CentOS 8 (Deprecated ended 2021-12-31)
* CentOS 7
* CentOS 6 (Deprecated ended 2020-11-30)

### Debian

* Debian 10.0
* Debian 9.0
* Debian 8.0 (Deprecated ended 2020-06-30)

### Ubuntu

* Ubuntu 20.04
* Ubuntu 18.04
* Ubuntu 16.04
* Ubuntu 14.04

To download Vagrant Box, you can search from [Discover Vagrant Boxes](https://app.vagrantup.com/boxes/search?provider=virtualbox).

**Note: The `vaw/centos*-default` and `vaw/centos*-full` Boxs has been deprecated. From now on, we recommend using the distribution box.**

By default, the Vagrantfile uses the `vaw/centos*-default` Box which has already provisioned default settings.

In addition, you can use the `vaw/centos*-full` Box which has already provisioned default settings and activate develop and deploy tools.

You can build the environment in a short period of time compared with provisioning from the pure vagrant Box.

### CentOS 7 (Deprecated)

* [vaw/centos7-default](https://atlas.hashicorp.com/vaw/boxes/centos7-default)
* [vaw/centos7-full](https://atlas.hashicorp.com/vaw/boxes/centos7-full)

### CentOS 6 (Deprecated)

* [vaw/centos6-default](https://atlas.hashicorp.com/vaw/boxes/centos6-default)
* [vaw/centos6-full](https://atlas.hashicorp.com/vaw/boxes/centos6-full)

## Provisioning mode

The VAW has three provisioning modes.

* `all` will normal provisioning from the pure Vagrant Box.
* `wordpress` provisions only sync folders including WordPress.
* `box` provision to create a Vagrant Box.

The VAW is characterized by being able to provision with various server and database configuration combinations. On the other hand, it takes time to build the environment from pure Vagrant Box.

You can create a Vagrant Box with server and database configuration in advance. By using the created Vagrant Box you can shorten the provisioning time.

First, create a Vagrant Box with Provision mode `box`.
Next, provision the created Vagrant Box with Provision mode `wordpress`.
Based on the Vagrant Box you created, WordPress development environment will start quickly anytime.

Since we're using IUS, I highly recommend keeping an eye on the [announcements repository](https://github.com/iusrepo) to be notified when packages are removed.

