<?php
return array (
  'items' => 
  array (
    'createPost' => 
    array (
      'type' => 2,
      'description' => 'Create a post',
    ),
    'updatePost' => 
    array (
      'type' => 2,
      'description' => 'Update post',
    ),
    'readPost' => 
    array (
      'type' => 2,
      'description' => 'read a post',
    ),
    'reader' => 
    array (
      'type' => 1,
      'children' => 
      array (
        0 => 'readPost',
      ),
    ),
    'author' => 
    array (
      'type' => 1,
      'children' => 
      array (
        0 => 'createPost',
        1 => 'reader',
      ),
      'assignments' => 
      array (
        2 => 
        array (
          'roleName' => 'author',
        ),
        5 => 
        array (
          'roleName' => 'author',
        ),
        6 => 
        array (
          'roleName' => 'author',
        ),
        9 => 
        array (
          'roleName' => 'author',
        ),
      ),
    ),
    'admin' => 
    array (
      'type' => 1,
      'children' => 
      array (
        0 => 'updatePost',
        1 => 'author',
      ),
      'assignments' => 
      array (
        1 => 
        array (
          'roleName' => 'admin',
        ),
      ),
    ),
  ),
  'rules' => 
  array (
  ),
);
