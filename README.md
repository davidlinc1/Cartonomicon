![Introduction to Cartonomicon](https://media.giphy.com/media/37r9LSUFNHUlPxRsSj/giphy.gif)

Cartonomicon is a web app built on Apache, MySQL, PHP. It uses a basic PHP file upload for maps, artwork, and custom marker images. There is a basic image management script at `localhost/img/` to handle asset management.

# Back the project on [Patreon](https://www.patreon.com/cartonomicon)!
[Patreon](https://www.patreon.com/cartonomicon)

[Homepage](https://cartonomicon.com/)

Hey! I'm Dave, a D&D nerd who builds worldbuilding web apps. By night, I paint digital battlemaps, DM campaigns for friends, and build tools to help make DMing more easy, fun, and immersive.

I developed Cartonomicon as an open source tool when I realized the power and utility in being able to upload, mark and share an annotated map or image with my players. I'd never really found a great tool to organize the points of interest and all the related information of my world, such as first-person descriptors, art, and other details.

I hope it is as useful to you as it has been for me! [Join the exclusive Cartonomicon](https://www.patreon.com/cartonomicon) community to get access to up-to-the-minute details about the app's development, including any closed betas, feature planning, and more!

![Introduction to Cartonomicon](https://media.giphy.com/media/fGObDa56t6JVtt2BHK/giphy.gif)

# Installation instructions

This installation entails working with webservers and databases, and will be tricky if you've never done that before. I've tested these instructions on a new Digital Ocean Ubuntu 18.04 Droplet, but it's a simple enough stack that it should work regardless of platform.

A more streamlined install process is on the to-do list, once the project is a little further along.

1. Install Apache

2. Install MySQL

3. Install PHP

4. In MySQL, run the following:

```
CREATE DATABASE maps_markers;
USE maps_markers;
```

```
CREATE TABLE maps (
`_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
title text NOT NULL,
mapImageURL text NOT NULL,
description text NOT NULL,
mapType tinytext NOT NULL,
parentMapID tinytext NOT NULL,
parentMarkerID tinytext NOT NULL,
defaultBackgroundColor varchar(6) NOT NULL
);
```

```
CREATE TABLE markers (
`_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
title text NOT NULL,
description text NOT NULL,
elementTypeID int(11) NOT NULL,
latLng tinytext NOT NULL,
mapID int(11) NOT NULL,
customMarkerImage text NOT NULL,
markerBioImage text NOT NULL,
markerLayerID int(11) NULL,
markerInStorage int(11) NOT NULL,
childMapID int(11) NULL,
wikiCategoryID int(11) NULL
);
```

```
CREATE TABLE marker_layers (
`_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
title text NOT NULL,
description text NOT NULL,
mapID int(11) NOT NULL
);
```

```
CREATE TABLE wiki_categories (
`_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
parentID int(11) NULL,
title text NOT NULL,
mapID int(11) NULL
);
```

5. Go to your webroot and run: 

```
mkdir map
cd map
sudo git init
sudo git pull https://github.com/davidlinc1/Cartonomicon.git
```

6. Run the following to ensure Apache can store and access uploaded images: 
```
sudo chmod 755 /var/www/html/map/img/*
sudo chown www-data:www-data /var/www/html/map/img/*
```

7. Edit `api.php` in the `/map/` directory to input your database username and password so the app can access your database.

From the project 'maps' directory:

```
nano api.php
```

Scroll to the bottom of this rather large file (Linux tip: press `CTRL + _` to open nano's search dialog, and press CTRL + V to jump to the bottom!), and where it asks for your database, fill in `maps_markers` unless you named the database something else in step 4.

```
$config = new Config([
    'username' => 'database-username-here',
    'password' => 'database-password-here',
    'database' => 'maps_markers',
]);
```

8. If you access `localhost/map` you should now see your Cartonomicon instance.

If you have any questions, join the [Discord](https://discord.gg/6MbjPqu)!
