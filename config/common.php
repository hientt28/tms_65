<?php

return [
    'user' => [
        'role' => [
            'trainee' => 0,
            'supervisor' => 1,
        ],
    ],
    'base_repository' => [
        'filter' => [],
        'attributes' => null,
    ],
    'pagination' => [
        'per_page_subject' => 5,
        'per_page_task' => 5,
    ],
    'status' => [
        1 => 'Created',
        2 => 'In Progress',
        3 => 'Cancel',
        4 => 'Pending',
    ],
    'paginate_document_per_page' => 5,
];
