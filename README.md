# Wordpress Template

Template for develop Wordpress theme with ACF Pro plugins.
    
    Wordpress version - 5.6

## Install Wordpress template:

1. git clone repository;
2. Take duplicator files in duplicator/ and move to site root;
3. Go install db > www.domain.com/installer.php;
4. After install db need activate develop theme in admin panel 

### Admin panel path: 
    
    www.domain.com/wp-admin

### Credentials: 

    Admin 
    Login - admin
    Password - admin123
    
    Editor
    Login - editor
    Password - editor123
    
    
## Start develop with gulp browser sync.

1. go to path wp-content/themes/my-theme;
2. change theme directory name (my-theme -> custom name); 
3. check npm and node js installed;
4. change package.json for your project;
5. npm i;
6. change proxy in path gulp/tasks/server.js;
7. import sass, js files to directory site-origin-sources - default files path (site-origin-sources/js , site-origin-sources/sass) you can change this path in gulp/config.js;
8. move img, fonts, media or another not build files to my-theme/assets;
9. change .gitignore (wp-content/themes/my-theme/assets/js, wp-content/themes/my-theme/assets/css) for custom theme name;
10. commands:
* `gulp` - run dev-server;
* `gulp build` - build project to production;

## Theme structure:

- assets
    - css
    - js
    - fonts
    - img
    - etc...
- inc - include some php plugins or library
- functions - directory with functions for theme (connect function in functions.php)
- template-parts
    - builder - builder flexible content
    - components
    - static
    - pages
        
### Plugins installed: 

- Advanced Custom Fields PRO
- Category Order and Taxonomy Terms Order
- Post Terms Order
- Classic Editor
- Disable Blogging
- Contact Form 7
- Contact Form CFDB7
- Disable All WordPress Updates
- Yoast Duplicate Post
- Duplicator Pro
- Health Check & Troubleshooting
- Post Types Order
- Query Monitor
- Safe SVG
- WP Maintenance Mode
- WP-Optimize - Clean, Compress, Cache
- Yoast SEO
- Loco Translate