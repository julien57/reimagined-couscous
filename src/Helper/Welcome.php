<?php

namespace App\Helper;

/**
 * Class Presentation.
 */
class Welcome
{
    public static function getDatas($page)
    {
        $data = [
            'accueil' => [
                [
                    'title' => 'Welcome',
                ],
            ],
            'rooms' => [
                [
                    'title' => '325</br>rooms<br/><span>Equiped with</span>',
                ],
            ],
            'apartments' => [
                [
                    'title' => '3?</br>studio apartments<br/><span>All Equiped with</span>',
                ],
            ],
            'about' => [
                [
                    'title' => 'about',
                ],
            ],
            'meeting_room' => [
                [
                    'title' => '14</br>Conference rooms<br/><span>All Equiped with</span>',
                ],
            ],

            'conference' => [
                [
                    'block_title' => 'Our reception rooms',
                    'title' => '14</br>Conference rooms<br/><span>All Equiped with</span>',
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }
}
