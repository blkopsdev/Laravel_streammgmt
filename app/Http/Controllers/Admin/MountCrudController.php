<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\DefaultCrudRequest as StoreRequest;
use App\Http\Requests\DefaultCrudRequest as UpdateRequest;

class MountCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Mount');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/mount');
        $this->crud->setEntityNameStrings('Icecast Mount', 'Icecast Mounts');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        //$this->crud->setFromDb();

        /*
        //'description',
        //'pin',
        //'conference_id',
        //'uuid',
        //'destination_number',
        //'codec',
        //'fs_connect_type',
        'mount_password',
        'mount_username',
        'max_listeners',
        'alias',
        'alias2',
        'bitrate',
        'audio_read',
        'audio_write',
        'streamer_ip',
        'streamer_type',
        'authorize'*/
        $this->crud->addField([
          'name' => 'mount',
          'type' => 'text',
          'label' => 'Mount ID'
        ]);

        $this->crud->addField([  // Select
            'label' => "Conference",
            'type' => 'select2',
            'name' => 'conference_id', // the db column for the foreign key
            'entity' => 'conference', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Conference" // foreign key model
        ]);

        $this->crud->addField([
          'name' => 'pin',
          'type' => 'text',
          'label' => 'Conference PIN'
        ]);

        $this->crud->addField([
          'name' => 'mount',
          'type' => 'text',
          'label' => 'Mount ID'
        ]);

        $this->crud->addField([
            'name' => 'codec',
            'label' => "Codec",
            'type' => 'select2_from_array',
            'options' => [
                'G722' => 'G722',
                'G711' => 'G711'
            ],
            'allows_null' => false,
        ]);

        $this->crud->addField([
            'name' => 'fs_connect_type',
            'label' => "FS Connection Type",
            'type' => 'select2_from_array',
            'options' => [
                'mod_shout' => 'mod_shout',
                'mod_vlc' => 'mod_vlc'
            ],
            'allows_null' => false,
        ]);

        $this->crud->addField([
          'name' => 'mount_password',
          'type' => 'text',
          'label' => 'Mount Password'
        ]);
        $this->crud->addField([
          'name' => 'mount_username',
          'type' => 'text',
          'label' => 'Mount Username'
        ]);
        $this->crud->addField([
            'name' => 'max_listeners',
            'type' => 'number',
          'label' => 'Max Listeners'
        ]);
        $this->crud->addField([
          'name' => 'alias',
          'type' => 'text',
          'label' => 'Alias'
        ]);
        $this->crud->addField([
          'name' => 'alias2',
          'type' => 'text',
          'label' => 'Alias #2'
        ]);
        $this->crud->addField([
          'name' => 'bitrate',
          'type' => 'select2_from_array',
          'options' => [
            '64' => '64 kbps',
            '128' => '128 kbps'
          ],
          'allows_null' => false,
        ]);
        $this->crud->addField([
            'name' => 'audio_read',
            'label' => 'Audio Read',
            'type' => 'select2_from_array',
            'options' => [
                '0' => 'Default',
                '1' => '+',
                '2' => '++',
                '3' => '+++'
            ],
            'allows_null' => false,
        ]);
        $this->crud->addField([
            'name' => 'audio_write',
            'label' => 'Audio Write',
            'type' => 'select2_from_array',
            'options' => [
                '0' => 'Default',
                '1' => '+',
                '2' => '++',
                '3' => '+++'
            ],
            'allows_null' => false,
        ]);
        //'streamer_ip',
        //'streamer_type',
        /*$this->crud->addField([
            'name' => 'authorize',
            'label' => "Authorization",
            'type' => 'select2_from_array',
            'options' => [
                '0' => 'No - Public',
                '1' => 'Yes - Login',
                '2' => 'Whitelist Only'
            ],
            'allows_null' => false,
        ]);  */

        /*$this->crud->addField([
            'name' => 'stream',
            'label' => "Streaming",
            'type' => 'select2_from_array',
            'options' => [
                '1' => 'No',
                '2' => 'Yes'
            ],
            'allows_null' => false,
        ]);

        $this->crud->addField([
            'name' => 'billing',
            'label' => "Billing",
            'type' => 'select2_from_array',
            'options' => [
                '1' => 'Not Setup',
                '2' => 'Setup',
                '3' => 'No Charge'
            ],
            'allows_null' => false,
        ]);

        $this->crud->addField([  // Select
            'label' => "Stream",
            'type' => 'select2',
            'name' => 'stream_mount', // the db column for the foreign key
            'entity' => 'mount', // the method that defines the relationship in your Model
            'attribute' => 'mount', // foreign key attribute that is shown to user
            'model' => "App\Models\Mount" // foreign key model
        ]);

        /* Columns */

        $this->crud->setColumns([
          'mount',
          'pin',
          [  // Select
              'name' => 'conference_id',
              'label' => "Conference",
              'type' => 'select2',
              //'type' => 'conference_title',
              'name' => 'conference_id', // the db column for the foreign key
              'entity' => 'conference', // the method that defines the relationship in your Model
              'attribute' => 'name', // foreign key attribute that is shown to user
              'model' => "App\Models\Conference" // foreign key model
          ],
          'mount_username',
          'mount_password',
          'max_listeners',
          'alias',
          'alias2',
          'bitrate',
          [
            'name' => 'audio_read',
            'label' => 'Audio Read',
            'type' => 'radio',
            'options' => [
                '0' => 'Default',
                '1' => '+',
                '2' => '++',
                '3' => '+++'
            ],
          ],
          [
            'name' => 'audio_write',
            'label' => 'Audio Write',
            'type' => 'radio',
            'options' => [
                '0' => 'Default',
                '1' => '+',
                '2' => '++',
                '3' => '+++'
            ],
          ],
          [
            'name' => 'codec',
            'label' => "Codec",
            'type' => 'radio',
            'options' => [
                'G722' => 'G722',
                'G711' => 'G711'
            ],
            'allows_null' => false,
          ],
          [
            'name' => 'fs_connect_type',
            'label' => "Connection Type",
            'type' => 'radio',
            'options' => [
                'mod_shout' => 'mod_shout',
                'mod_vlc' => 'mod_vlc'
            ],
            'allows_null' => false,
          ],
          [  // Select
              'name' => 'mount_authorization_level_id',
              'label' => "Authorization Level",
              'type' => 'select2',
              //'type' => 'conference_title',
              'name' => 'id', // the db column for the foreign key
              //'entity' => 'conference', // the method that defines the relationship in your Model
              'attribute' => 'name', // foreign key attribute that is shown to user
              'model' => "App\Models\MountAuthorizationLevel" // foreign key model
          ]
        ]);





        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
