# CakePHP Application Skeleton

For the purpose of this project I used Nginx and CakePHP 3.8 red velvet with the migration plugin and bootstrap framework on the front end part.
Dispite the fact the assessment says clearly that it should be made with apache web server I used Nginx 
because I find it more appropriate to my needs. however if you are feel more confortable with Apache please do so and use it accordingly.  

The Nginx server block file is on config-database folder please note that you need to generate ssl keys.

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
2) On edit view the user has the ability to select from one to many related articles and attach them 
to the article being edited. At the very end the user will be able to view the 
attached related articles if you click view article then you will get redirected to the related article accordingly 
please see the screenshot below:

```
![Alt text](/config-database/1.png?raw=true "images")

```
3) On article view action the user will be able view the table with the information of the article and also will have the ability to mark the article as archive. 
```

![Alt text](/config-database/2.png?raw=true "images")

```
4) If the user clicks the archieve button he will be redirect to the index action view and the article will be marked as archieve please see the screenshot below.
```

![Alt text](/config-database/3.png?raw=true "images")


```
5) In addition when an article is deleted also all the attached related articles are deleted. The user also will have the ability to view/edit/create/delete related articles. When a new related article is created then user will have the ability to select in which article should be attached.
```

![Alt text](/config-database/4.png?raw=true "images")

```
Please see the screenshot action view of related articles below:
```

![Alt text](/config-database/6.png?raw=true "images")

```
Please see the screenshot action edit of related articles below: 
The user will have the ability to edit the related article and also select another article to be attached to.
```

![Alt text](/config-database/7.png?raw=true "images")