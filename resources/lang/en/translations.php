<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Filament Page Hints
    |--------------------------------------------------------------------------
    |
    | All english translations for this plugin goes here
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Navigation and Resource
    |--------------------------------------------------------------------------
    */
    'nav.label' => 'Page Hints',
    'nav.icon' => 'heroicon-o-question-mark-circle',
    'nav.state.empty.heading' => 'No page hints',
    'nav.state.empty.description' => 'Welcome, you will find here, hints that will serve as a user guide.',

    'modal.buttons.create.label' => 'New Hint',
    'modal.buttons.edit.label' => 'Edit Hint',
    'modal.buttons.delete.label' => 'Delete Hint',
    'modal.buttons.submit.label' => 'Submit',

    'modal.alert.delete' => 'Are you sure you want to delete this hint?',

    'resource.label.hint' => 'Page Hint',
    'resource.label.hints' => 'Page Hints',

    'resource.form.title' => 'Title',
    'resource.form.url' => 'Page',
    'resource.form.route' => 'Page route',
    'resource.form.hint' => 'Hint',
    'resource.form.video_url' => 'Video URL',

    'resource.form.hint.placeholder.label' => 'Enter your hint(s)',
    'resource.form.url.placeholder.label' => 'Enter page url for hint',
    'resource.form.route.placeholder.label' => 'Enter page route for hint',
    'resource.form.title.placeholder.label' => 'Enter hint title',
    'resource.form.video_url.placeholder.label' => 'Enter video url for hint, YouTube or Vimeo',
    'resource.form.video_url.error' => 'The attribute must be a valid YouTube or Vimeo video URL.',

    'resource.table.url' => 'Page',
    'resource.table.title' => 'Title',
    'resource.table.route' => 'Route',
    'resource.table.hint' => 'Hint',
    'resource.table.video_url' => 'Video URL',

    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    */
    'notification.upsert' => 'Page hint has been updated successfully.',
    'notification.delete' => 'Page hint deleted.',
];
