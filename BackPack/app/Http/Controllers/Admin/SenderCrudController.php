<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SenderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SenderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SenderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Sender::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/sender');
        CRUD::setEntityNameStrings('sender', 'senders');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        
        CRUD::column('name');
        CRUD::column('email');
        CRUD::column('pass_code');
        CRUD::column('host');
        CRUD::column('port');
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SenderRequest::class);
        CRUD::field('name');
        CRUD::field('email');
        CRUD::field('pass_code');
        CRUD::field('host');
        CRUD::addField(['name' => 'host', 'value' => 'smtp.gmail.com']);
        CRUD::field('port');
        CRUD::addField(['name' => 'port', 'value' => '587']);
        CRUD::field('SMTPSecure');
        CRUD::addField([
            'name' => 'SMTPSecure',
            'type'    => 'select_from_array',
            'options' => ['1' => 'True', '0' => 'False']
        ]);
        
        
        
        // CRUD::addField([   // Use addField for custom field configurations
        //     'name' => 'SMTPSecure',
        //     'label' => 'SMTP Secure',
        //     'type' => 'select',
        //     'options' => [   // Provide the options for the dropdown
        //         'tls' => 'TLS',
        //         'ssl' => 'SSL',
        //         'other_option' => 'Other Option',
        //     ],
        // ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
