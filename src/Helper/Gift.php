<?php

namespace App\Helper;

/**
 * Class Gift.
 */
class Gift
{
    public static function getDatas($page)
    {
        $data = [
            'about' => [
                [
                    'description' => [
                        'block_title' => 'Gift vouchers',
                        'title' => 'Gift vouchers',
                        'text' => 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard',
                        'link' => 'gifts',
                    ],
                    'bg_img' => 'bon-2.png',
                    'bg_img_2' => 'bon-2.png',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'has_text_block' => 1,
                ],
            ],
            'gifts' => [
                [
                    'circle' => [
                        'title' => 'Our Gift Vouchers',
                        'text' => 'Offer them wellbeing and relaxation',
                        'text2' => '50 TO 250 <i class="fa fa-eur" aria-hidden="true"></i>',
                        'bg_color' => '#D4AF37',
                    ],

                    'bg_img' => 'bon-2.png',
                    'bg_img_2' => 'bon-2.png',
                    'sub_bg_img' => 'alvisse_home_motif01.jpg',
                    'large' => 'large',
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }
}
