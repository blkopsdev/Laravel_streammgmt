<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\UserSiteRequest as StoreRequest;
use App\Http\Requests\UserSiteRequest as UpdateRequest;

class ConferenceCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Conference');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/conference');
        $this->crud->setEntityNameStrings('Conference Bridge', 'Conference Bridges');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->crud->setColumns([
          'name',
          'location',
          'conference_id',
          'host_pin',
          [  // Select
              'name' => 'salesperson',
              'label' => "Salesperson",
              'type' => 'select2',
              'name' => 'salesperson', // the db column for the foreign key
              'entity' => 'salesperson', // the method that defines the relationship in your Model
              'attribute' => 'name', // foreign key attribute that is shown to user
              'model' => "App\Models\Salesperson" // foreign key model
          ],
          [
            'name' => 'stream',
            'label' => 'Stream Enabled',
            'type' => 'radio',
            'options' => [
                '1' => 'No',
                '2' => 'Yes'
            ],
          ],
          'stream_listeners',
          [
            'name' => 'billing',
            'label' => 'Billing Status',
            'type' => 'radio',
            'options' => [
                '0' => 'Not Setup',
                '1' => 'Not Setup',
                '2' => 'Setup',
                '3' => 'No Charge'
            ],
          ],
          [  // Select
              'name' => 'conference_authorization_level_id',
              'label' => "Authorization Level",
              'type' => 'select2',
              'name' => 'id', // the db column for the foreign key
              //'entity' => 'conference', // the method that defines the relationship in your Model
              'attribute' => 'name', // foreign key attribute that is shown to user
              'model' => "App\Models\ConferenceAuthorizationLevel" // foreign key model
          ]
        ]);


        $this->crud->addFields([
          'name',
          'location',
          'conference_id',
          'host_pin',
          [  // Select
              'name' => 'salesperson',
              'label' => "Salesperson",
              'type' => 'select2',
              'name' => 'salesperson', // the db column for the foreign key
              'entity' => 'salesperson', // the method that defines the relationship in your Model
              'attribute' => 'name', // foreign key attribute that is shown to user
              'model' => "App\Models\Salesperson" // foreign key model
          ],
          [
            'name' => 'stream',
            'label' => 'Stream Enabled',
            'type' => 'radio',
            'options' => [
                '1' => 'No',
                '2' => 'Yes'
            ],
          ],
          [
            'name' => 'stream_listeners',
            'label' => 'Listener Cap',
            'type' => 'radio',
            'options' => [
                '0' => '0',
                '51' => '51',
                '101' => '101',
                '501' => '501',
                '1001' => '1001'
            ],
          ],
          [
            'name' => 'billing',
            'label' => 'Billing Status',
            'type' => 'radio',
            'options' => [
                '1' => 'Not Setup',
                '2' => 'Setup',
                '3' => 'No Charge'
            ],
          ],
          [  // Select
              'name' => 'conference_authorization_level_id',
              'label' => "Authorization Level",
              'type' => 'select2',
              'name' => 'id', // the db column for the foreign key
              //'entity' => 'conference', // the method that defines the relationship in your Model
              'attribute' => 'name', // foreign key attribute that is shown to user
              'model' => "App\Models\ConferenceAuthorizationLevel" // foreign key model
          ],
          [
            'name' => 'notes',
            'label' => 'Notes',
            'type' => 'wysiwyg'
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
