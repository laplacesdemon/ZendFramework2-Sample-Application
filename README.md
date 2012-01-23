ZF2 Sample Application
======================

Introduction
------------
This is a sample application for getting started to Zend Framework 2. I follow the
instructions on Akrabat's ZF2 tutorial (http://akrabat.com/getting-started-with-zend-framework-2/)
and I used ZendFrameworkSkeletonApplication as the starting point which is available
at GitHub. 

The application is a simple database CRUD operation. It has a module called "Album"
and an AlbumController to create, edit, delete the albums.

As the database layer I have used the ZendDb, but I am planning to implement a 
Doctrine2 version sometime.


Installation
------------
The only modification that you should do is to change the "ZF2_PATH" constant
in the /public/index.php file. This constant shows the exact location of the 
ZF2 library. Alternatively you can add the library in your include path. I didn't 
do that because I still use the older ZF version in my include_path

The database you should create is named "zf2tutorial". Following is the SQL statements for
creating it.

<pre>
CREATE TABLE album (
  id int(11) NOT NULL auto_increment,
  artist varchar(100) NOT NULL,
  title varchar(100) NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO album (artist, title)
 VALUES ('Coldplay', 'Mylo Xyloto');
INSERT INTO album (artist, title)
 VALUES ('Noel Gallagher', 'Noel Gallagher\'s High Flying Birds!'); INSERT INTO album (artist, title)
 VALUES ('Adele', '21');
INSERT INTO album (artist, title)
 VALUES ('Matt Cardle', 'Letters');
INSERT INTO album (artist, title)
 VALUES ('Steps', 'The Ultimate Collection');
</pre>