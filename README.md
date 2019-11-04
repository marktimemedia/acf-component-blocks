# ACF Block Components for WordPress

ACF Blocks plugin for WordPress for displaying custom content within pages and posts. **Requires [Advanced Custom Fields Pro](http://advancedcustomfields.com/pro), [ACF Term and Taxonomy Chooser](https://github.com/marktimemedia/acf-term-and-taxonomy-chooser), [ACF Post Type Selector](https://github.com/TimPerry/acf-post-type-selector) and [ACF Widget Area Field](https://wordpress.org/plugins/advanced-custom-fields-widget-area-field/)**.

Recommended for use with [ACF Options Page](https://github.com/marktimemedia/acf-theme-settings) and [Pink Spring Theme](https://github.com/marktimemedia/pink-spring)

Works with most standard WordPress themes.

### Custom Blocks (Flexible Fields)
1. Single Column Content with heading
2. Dual Column Content with heading
3. Content with Callout and heading
4. Hero Image with text and call to action buttons
5. Video/Embedded Media with text and call to action buttons
6. Slider with text and links
7. Feature Boxes (post content, latest post, or manual)
8. Call to Action with heading, subheading, buttons
8. Logo Feature with image/link repeater
9. Widget Area
10. Post List
11. Post Grid
12. Manual List
13. Manual Grid
14. Tabs
15. Gallery (using WordPress Gallery)



### Vague Description of How To Use
1. Install and activate the plugin
2. Build posts and pages using Custom Blocks


### Vague Description of How To Theme
1. Create a folder called `mtm-templates` in the root of your theme or child theme
2. Copy any of the `block` or `content` template parts in the plugin `templates` folder into your `mtm-templates` folder, and modify/style them at will. The plugin will automatically override them.
3. To call any of the custom template parts from another part of your theme, use the `mtm_get_block_part()` function
