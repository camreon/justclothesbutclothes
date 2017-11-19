# JUST CLOTHES BUT CLOTHES

lil Kirby CMS site

## Quick start

- `git clone git@github.com:camreon/justclothesbutclothes.git`
- `cd justclothesbutclothes`
- `./start`

## Adding Tags

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

## Adding Content

- add a new folder in `./content/1-pieces`
- folder name must start with the next number and contain a `piece.txt` file
- `piece.txt` is where you define each item's name, tags, etc.
- images of the piece should also be in this folder

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
