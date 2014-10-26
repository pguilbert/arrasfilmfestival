Arras Film Festival 2014
=========

This the wordpress theme for the Arras Film Festival edition 2014. 

Website
-------

[Arras Film Festival](http://arrasfilmfestival-epsi.fr/)

Prerequisites
-------------
* Your server must have url rewriting & GD library installed on your server.

Installation
--------------

```sh
cd /to/your/wordpress/path
npm install
git clone git@github.com:tomapp/arrasfilmfestival.git
gulp uglify
```
And that's all!

Configuration
-------------

After clone the theme in your wordpress install you need to setup it. 

1. Activate the theme in the admin.
2. Create page and attach them model page. 
3. Create menus in ```apparence/menus```.
  * The first must be call "principal" with a name and this class : ```w-nav-link nav-link```.
  * Once you've finish previous steps, don't forget to add your page in it. 
4. Activate and setup this plugins :
  * Advanced Custom Fields
    * Attach a new fields group to "Post" and call a field "Hat". Give it a limit to 200 characters. Don't forget to set the rule "Show this field when kind of publication is equals to post.".
    * Attach create a new fields group to "Partner" and call a field "Link" then, set "Kind of the publication" for be equals to "partner". 
    * Attach a new fields group to "Live". Call a "True/False" field "is_live" and a text field "additional_text". Don't forget to set the rule "Show this field when kind of publication is equals to live.".
  * You can also activate Wp Password Generator.
5. User's avatar come from Gravatar. 
6. Regenerate your .htaccess with permalinks.

Version
----

0.1.0

Author
-----
[Thomas Leduc](http://thomasleduc.net/)