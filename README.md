# Abre

Abre is a software platform that allows schools to manage and distribute web-based software to staff, students, and parents. Abre provides an ecosystem of software applications to help administrators, teachers, students and parents focus on education. Abre is licensed under the Affero General Public License version 3 as published by the Free Software Foundation. Contributors welcomed.

## Installation

### Clone Repo

  1.  Click on the green button at the top that says **"Clone or Download"**
  2.  Open the repository in Github Desktop or another program and clone the repository to your machine.

### Set up a Web-server

  1.  Choose your fighter:
    * [XAMPP](https://www.apachefriends.org/index.html) - cross platform (Windows, Mac, Linux), Apache2, MySQL, PHP, Perl
    * [MAMP](https://www.mamp.info/en/) - Mac OS, Apache2, MySQL, PHP
    * [LAMP](https://www.linode.com/docs/web-servers/lamp/install-lamp-stack-on-ubuntu-18-04/) - Linux, Apache2, MySQL, PHP (Little harder for Newbies, linked website is for Ubuntu 18.04)
  2. Download your pick from the internet and follow their install instructions.

**	\(⌐◔\_◔\) Make sure you install all three: Apache, PHP 7, and MySQL! \(◕\_◕¬\)**


### Connect Abre installation to Web-server

  **Change Document Root to Repo Location**

    blah bajslfkjs fsjfa sfkls jflksjaflksjfl
    sfaskjfslkjf s
    sfjlksdjf
  ***Or***

  **Copy Repo into Document Root**

    blah bajslfkjs fsjfa sfkls jflksjaflksjfl
    sfaskjfslkjf s
    sfjlksdjf

### Open Browser & Follow install program

  blah bajslfkjs fsjfa sfkls jflksjaflksjfl
  sfaskjfslkjf s
  sfjlksdjf

## Development

### Follow Install from Above

*You'll need a webserver no matter what*

### Download IDE

  1. Download and install the [Jetbrains Toolbox](https://www.jetbrains.com/toolbox/app/) and install PHPStorm from the Toolbox.
    * *Trust me it's easier this way, everything just stays updated*

### Integrate Webserver with PHPStorm

  Follow this [JetBrains Guide](https://www.jetbrains.com/help/phpstorm/installing-an-amp-package.html) but skip the first section about installing an AMP package, you've already done that.

### Integrate PHP with PHPStorm

##### If you have a Local webserver Follow [these instructions](https://www.jetbrains.com/help/phpstorm/configuring-local-interpreter.html)
##### If you have a Remote webserver Follow [these instructions](https://www.jetbrains.com/help/phpstorm/configuring-remote-interpreters.html)

### Integrate Xdebug with PHPStorm

**As a starting point use this [guide](https://www.jetbrains.com/help/phpstorm/configuring-xdebug.html).**

If you are running a MacOS or Linux web-server, you may need to Download/Compile Xdebug using PECL by running `pecl install xdebug`. PECL should be installed automatically, but if not, run `sudo apt-get install php7.1-dev` on Linux or install [Homebrew](https://brew.sh/) on MacOS and run `brew install php7.1-dev`. If there's still trouble, search Google for `install PECL <your_OS>`

#### Install JetBrains Extension





## Documentation

Please visit <a href="https://abre.io/resources/" target="_blank">https://abre.io/resources/</a> for setup.
