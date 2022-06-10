<?php

namespace App\Helper;

 /**
  * Class Contact.
  */
 class Contact
 {
     public static function getDatas($page)
     {
         $data = [
            'apartments' => [
                [
                    'title' => 'Contact',
                    'description' => 'Anymore questions?',
                    'submit' => 'Contact',
                ],
            ],
            'gifts' => [
                [
                    'title' => 'Contact',
                    'description' => 'Anymore questions?',
                    'submit' => 'Contact',
                ],
            ],

            'class_reunion' => [
                [
                    'title' => 'Contact',
                    'description' => 'Anymore questions?',
                    'submit' => 'Contact',
                ],
            ],
        ];

         if (array_key_exists($page, $data)) {
             return $data[$page];
         }
     }
 }
