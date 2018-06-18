CMB2 Post Type Field
====================

A multi-check field to select post types.

```php
$list = new_cmb2_box(array(
    'id'            => 'list',
    'title'         => __('List', 'theme'),
));

$post_types = $list->add_field(array(
    'name' => __( 'Post Types Included In List', 'theme'),
    'id'   => 'post_types',
    'type'    => 'multicheck_post_type',
    'default' => ['page', 'post'],
));
```
