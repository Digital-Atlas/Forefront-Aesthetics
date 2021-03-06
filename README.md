_s
===

Hi. I'm a starter theme called `_s`, or `underscores`. I'm a theme meant for hacking so don't use me as a Parent Theme. Instead, try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for!

I feature some of the web's most exciting technologies like: [Gulp](http://gulpjs.com/), [LibSass](http://sass-lang.com/), [PostCSS](https://github.com/postcss/postcss), and [BrowserSync](https://www.browsersync.io/) to help make your development process fast and efficient. I'm also accessible, passing both WCAG 2.0AA and Section 508 standards out of the box.

## Getting Started

### Prerequisites

Because I'm bundled with Gulp, basic knowledge of the command line and the following dependencies are required: [Node](https://nodejs.org), [Gulp CLI](https://github.com/gulpjs/gulp-cli) (`npm install -g gulp-cli`), and [Bower](https://bower.io/) (`npm install -g bower`).


### Setup


1) Find & Replace

You'll need to change all instances of the names: `_s`.

**Required:**

* Search for `_s.dev` and replace with: `project-name.dev` to match your local development URL

**Optional:**

* Search for: `'_s'` and replace with: `'project-name'` (inside single quotations) to capture the text domain
* Search for: `_s_` and replace with: `project-name_` to capture all the function names
* Search for: `Text Domain: _s` and replace with: `Text Domain: project-name` in style.css
* Search for (and include the leading space): <code>&nbsp;_s</code> and replace with: <code>&nbsp;Project Name</code> (with a space before it) to capture DocBlocks
* Search for: `_s-` and replace with: `project-name-` to capture prefixed handles
* Search for `_s.pot` and replace with: `project-name.pot` to capture translation files
* * Edit the theme information in the header of style.scss to meet your needs



## Development

After you've installed and activated me. It's time to setup Gulp.

1) From the command line, change directories to your new theme directory

```bash
cd /your-project/wordpress/wp-content/themes/your-theme
```

2) Install theme dependencies

```bash
npm install && bower install
```

### Gulp Tasks

From the command line, type any of the following to perform an action:

`gulp watch` - Automatically handle changes to CSS, JS, SVGs, and image sprites. Also kicks off BrowserSync.

`gulp icons` - Minify, concatenate, and clean SVG icons.

`gulp i18n` - Scan the theme and create a POT file.

`gulp sass:lint` - Run Sass against WordPress code standards.

`gulp js:lint` - Run Javascript against WordPress code standards.

`gulp scripts` - Concatenate and minify javascript files.

`gulp sprites` - Generate an image sprite and the associated Sass (sprite.png).

`gulp styles` - Compile, prefix, combine media queries, and minify CSS files.

`gulp` - Runs the following tasks at the same time: i18n, icons, scripts, styles, sprites.



### Assets
```
assets/
	|- images/						# Images
	|
	|- scripts/						# JavaScript files (all files are minified except those ending in *config.js)
	|	|- concat/					# All files are concatenated to project.js
	|	|- project.js 				# Our non-minified development JavaScript file
	|	|- project-min.js 			# Our minified production JavaScript file
	|
	|- sass/
	|	|
	|	|– base/ 				 	       # Base elements
	|	|   |– _accessibility.scss    # Accessibility
	|	|   |– _clearing.scss         # Clearing elements
	|	|   |– _objects-media.scss    # Formatting images, videos, etc.
	|	|   ...                       # Etc.
	|	|
	|	|– components/  		 # Element items that are a combination of base items
	|	|   |– _comments.scss  # Comments
	|	|   |– _pagination.scss  # Pagination
	|	|   ...                  # Etc.
	|	|
	|	|– foundation/  		 # Foundation 6
	|	|   |– _settings.scss  # Default Settings (todo: remove)
	|	|   |– _app.scss       # Load Foundation Components
	|	|
	|	|– modules/ 			 # Sections and content blocks
	|	|   |– _hero.scss      	  # Hero
	|	|   |– _slider.scss      # Slider
	|	|   ...                  # Etc.
	|	|
	|	|– plugins/ 			 # Plugin styles
	|	|   |– _gravity-forms.scss      # Gravity Forms
	|	|   ...                         # Etc.
	|	|
	|	|– settings/ 			 # Settings
	|	|   |– _settings.scss    # Settings
	|	|
	|	|– structure/ 			  # Page structure & blocks
	|	|   |– _header.scss      # Header
	|	|   |– _footer.scss      # Footer
	|	|   ...                  # Etc.
	|	|
	|	|– template/ 				 # Page specific styles
	|	|   |– _front-page.scss  # Home specific styles
	|	|   |– _page.scss        # Page specific styles
	|	|   ...                  # Etc.
	|	|
	|	|– utilities/ 			  # Functions & Mixins
	|	|   |– functions/        # Functions
	|	|   |– mixins            # Mixins
	|	|
	|	|– style.scss              # Primary Sass file
	| |
node_modules/					# Foundation for sites + gulp plugins
	| |
	| |-foundation-sites/
```
## WordPress files
Our starter theme follows the Codex Template Hierarchy as found on http://codex.wordpress.org/Template_Hierarchy.

Site Front Page 		-	`front-page.php`


