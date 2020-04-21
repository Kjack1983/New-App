# CakePHP Application Skeleton

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 3.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

For the purpose of this project I used Nginx and CakePHP 3.8 red velvet with the migration plugin and bootstrap framework on the front end part.
Dispite the fact the assessment says clearly that it should be made with apache web server I used nginx 
because I find more advanced and appropriate. The Nginx file is on config-database folder.

This is the table that was created through migration Plugin and the extra fields after the creation of the table.
in order to view the table and field files please go to config/Migrations

```
    bin/cake bake migration CreateArticles title:string body:text created modified
```

```
    bin/cake bake migration AddReferenceToArticles reference:string
```

```
    bin/cake bake migration AddArchivedToArticles archived:boolean
```

and then

```
    bin/cake migrations migrate
```

However I also created another table without the use of the migration plugin called related_articles.
Therefore it would be wiser to import the database directly to your local mysql db. 
The db is located into config-database folder.

# Application Functionality

```
1) The user will have the ability to create/delete/edit/view articles. 
2) On edit view the user has the ability to select from one to multiple related articles and attach it 
on the article being edited. In addition at the very end the user will be able to view the 
attached related articles please see the screenshot below:

```
![Alt text](/config-database/1.png?raw=true "images")

```
3) On action view action the user will be able 
```