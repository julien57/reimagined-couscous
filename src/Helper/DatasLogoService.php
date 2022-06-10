<?php

namespace App\Helper;

/**
 * Class DatasLogoService.
 */
class DatasLogoService
{
    public static function getDatas($page = '')
    {
        if ('' != $page) {
            if (preg_match('/_/i', $page)) {
                $page = explode('_', $page);
                $tmp = '';
                foreach ($page as $p) {
                    $tmp .= ucfirst($p);
                }
                $method = 'get'.$tmp;
            } else {
                $method = 'get'.ucfirst($page);
            }

            return self::$method();
        }

        return $data = [
            [
                [
                    'img' => 'icon_equiped_01_wifi.svg',
                    'title' => 'FREE WIFI',
                ],
                [
                    'img' => 'icon_equiped_02_office.svg',
                    'title' => 'OFFICE',
                ],
                [
                    'img' => 'icon_equiped_03_bar.svg',
                    'title' => 'MINI BAR',
                ],

                [
                    'img' => 'icon_equiped_04_safe.svg',
                    'title' => 'SAFE',
                ],
                [
                    'img' => 'icon_equiped_05_pet.svg',
                    'title' => 'PET ON REQUEST',
                ],
                [
                    'img' => 'icon_equiped_06_bath.svg',
                    'title' => 'BATH ROOM',
                    'text' => 'With hairdryer and bathrobes',
                ],
                [
                    'img' => 'icon_equiped_07_screen.svg',
                    'title' => 'FLAT SCREEN',
                    'text' => 'LCD TV with international channels',
                ],

                [
                    'img' => 'icon_equiped_08_laundry.svg',
                    'title' => 'LAUNDRY SERVICE',
                    'text' => 'Extra charge. Iron and board on request',
                ],
            ],
        ];
    }

    protected static function getMeetingRoom()
    {
        return $data = [
            [
                [
                    'img' => 'icon_equiped_01_wifi.svg',
                    'title' => 'WIFI',
                ],
                [
                    'img' => 'icon_equiped_02_office.svg',
                    'title' => 'MICRO',
                ],
                [
                    'img' => 'icon_equiped_03_bar.svg',
                    'title' => 'DAYLIGHT',
                ],

                [
                    'img' => 'icon_equiped_04_safe.svg',
                    'title' => 'AIR CONDITIONING',
                ],
                [
                    'img' => 'icon_equiped_05_pet.svg',
                    'title' => 'VIDEO PROJECTION',
                ],
                [
                    'img' => 'icon_equiped_06_bath.svg',
                    'title' => '480 FREE',
                    'text' => 'PARKING SPACES',
                ],
            ],
        ];
    }
}
