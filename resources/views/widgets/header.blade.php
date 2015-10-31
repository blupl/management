<?php $navbar = new Illuminate\Support\Fluent([
    'id'    => 'management',
    'title' => 'BCB Management',
    'url'   => '#',
    'menu'  => view('blupl/management::widgets._menu'),
]); ?>

@decorator('navbar', $navbar)
