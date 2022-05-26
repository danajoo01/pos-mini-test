<?php

return [
    /*
     * Namespaces used by the generator.
     */
    'namespace'     => [
        /*
         * Base namespace/directory to create the new file.
         * This is appended on default Laravel namespace.
         * Usage: php artisan datatables:make User
         * Output: App\DataTables\UserDataTable
         * With Model: App\User (default model)
         * Export filename: users_timestamp
         */
        'base'  => 'DataTables',

        /*
         * Base namespace/directory where your model's are located.
         * This is appended on default Laravel namespace.
         * Usage: php artisan datatables:make Post --model
         * Output: App\DataTables\PostDataTable
         * With Model: App\Post
         * Export filename: posts_timestamp
         */
        'model' => '',
    ],

    /*
     * Set Custom stub folder
     */
    //'stub' => '/resources/custom_stub',

    /*
     * PDF generator to be used when converting the table to pdf.
     * Available generators: excel, snappy
     * Snappy package: barryvdh/laravel-snappy
     * Excel package: maatwebsite/excel
     */
    'pdf_generator' => 'excel',

    /*
     * Snappy PDF options.
     */
    'snappy'        => [
        'options'     => [
            'no-outline'    => true,
            'margin-left'   => '0',
            'margin-right'  => '0',
            'margin-top'    => '10mm',
            'margin-bottom' => '10mm',
        ],
        'orientation' => 'landscape',
    ],

    /*
     * Default html builder parameters.
     */
    'parameters'    => [
        'dom'     => 'B<"d-flex justify-content-between align-items-center mt-4 mb-2 border-top pt-4"lf><tr><"mt-3 d-flex justify-content-between align-items-center"ip>',
        'order'   => [[0, 'desc']],
        'buttons' => [
            'create',
            'export',
            'print',
            'reset',
        ],
    ],

    /*
     * Generator command default options value.
     */
    'generator'     => [
        /*
         * Default columns to generate when not set.
         */
        'columns' => 'id,add your columns,created_at,updated_at',

        /*
         * Default buttons to generate when not set.
         */
        'buttons' => 'create,export,print,reset',

        /*
         * Default DOM to generate when not set.
         */
        'dom' => 'B<"d-flex justify-content-between align-items-center mt-4 mb-2 border-top pt-4"lf><tr><"mt-3 d-flex justify-content-between align-items-center"ip>',
    ],
];
