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

# [How To Install Jenkins on Ubuntu 22.04](https://www.digitalocean.com/community/tutorials/how-to-install-jenkins-on-ubuntu-22-04)

## Jenkins Multibranch Pipeline
### Test
Jenkins starts testing the REST API Endpoints are active with the CURL commands written in the test-script.sh.
### Deploy
Deploying a pre-configured virtual machine with Vagrant.
### Backup
Database data backup. Save at `backup-%Y%m%d%H%M%S.sql` format in the `backup` folder.
### Vagrant configuration file (Ruby)
