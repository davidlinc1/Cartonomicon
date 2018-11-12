Cartonomicon is a web app built on Apache, MySQL, PHP. It uses a basic PHP file upload for maps, artwork, and custom marker images. There is a basic image management script at `localhost/img/` to handle asset management.

# Back the project on [Patreon](https://www.patreon.com/cartonomicon)!
[Patreon](https://www.patreon.com/cartonomicon)

[Homepage](https://cartonomicon.com/)

Hey! I'm Dave, a D&D nerd who builds worldbuilding web apps. By night, I paint digital battlemaps, DM campaigns for friends, and build tools to help make DMing more easy, fun, and immersive.

I developed Cartonomicon as an open source tool when I realized the power and utility in being able to upload, mark and share an annotated map or image with my players. I'd never really found a great tool to organize the points of interest and all the related information of my world, such as first-person descriptors, art, and other details.

I hope it is as useful to you as it has been for me! [Join the exclusive Cartonomicon](https://www.patreon.com/cartonomicon) community to get access to up-to-the-minute details about the app's development, including any closed betas, feature planning, and more!

# Installation instructions

This installation entails working with webservers and databases, and will be tricky if you've never done that before. I've tested these instructions on a new Digital Ocean Ubuntu 18.04 Droplet, but it's a simple enough stack that it should work regardless of platform.

1. Install Apache

2. Install MySQL

3. Install PHP

4. In MySQL, add the following:
	1. A database labeled `maps_markers`
	2. A table labeled `maps`
	3. A table labeled `markers`
	4. A table labeled `marker_layers`

5. Go to your webroot and run: 
	1. `mkdir map`
	2. `cd map`
	3. `sudo git pull https://github.com/davidlinc1/Cartonomicon.git`

6. Run the following to ensure Apache can store and access uploaded images: 
	1. `sudo chmod 755 /var/www/html/map/img/*`
	1. `sudo chown www-data:www-data /var/www/html/map/img/*`

7. Edit `api.php` in the `/map/` directory and scroll to the bottom, providing your database username and password. Where it asks for your database, fill in `maps_markers` unless you named the database something else.

8. If you access `localhost/map` you should now see your Cartonomicon instance.