# BuddyMeterAnalyzer
Analyze BuddyMeter quizzes.

## Example
https://www.sikeserver.com/tools/buddy/MEsrY4R

## Environment
- PHP (Tested on 7.1.8)

## Installing
1. Install Git and [PHP](https://secure.php.net/)
```sh
apt-get install git php # Ubuntu
yum install git php # CentOS
```
2. Clone this repository
```sh
git clone https://github.com/Siketyan/BuddyMeterAnalyzer.git
cd BuddyMeterAnalyzer
```
3. Install [Composer](https://getcomposer.org/)
```sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
4. Install dependencies via Composer
```sh
./composer.phar install
```
5. Make analyze.php accessible via HTTP server
