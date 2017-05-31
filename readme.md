# JCBC

Kirby CMS based site

## Quick start

- `git clone git@github.com:camreon/justclothesbutclothes.git`
- `cd justclothesbutclothes`
- `php -S localhost:8888`

## Adding Categories

- open `./site/blueprints/piece.yml`
- add a new block in this format (replacing `name` with the category name):
   ```
   name:
     label: name
     field: name
     type: tags
     index: template
   ```
- then you can add tags to that category within the panel or the raw `piece.txt` files

## The Panel

You can find the login for Kirby's admin interface at
http://localhost:8888/panel. You will be guided through the signup
process for your first user, when you visit the panel
for the first time.

## Deployment

Kirby does not require a database, which makes it very easy to
install. Just copy Kirby's files to your server and visit the
URL for your website in the browser.

**Please check if the invisible .htaccess file has been
copied to your server correctly**

### Requirements

Kirby runs on PHP 5.4+, Apache or Nginx.
