```php
<div class="accordion accordion-flush">
wp_nav_menu(
  [
    'theme_location' => 'primary',
    'menu_id'        => 'primary',
    'menu_class'     => 'menu header-primary d-flex flex-row navbar-nav ms-auto m-0 ps-0 align-items-center gap-5 list-style-none text-dark',
    'depth' => 0,
    'container' => false,
    'items_wrap' => '%3$s',
    'walker' => new WP_BS_Accordion_Navwalker(),
  ]
);
</div>
```
