<?php

namespace App\Helper;

/**
 * Class GiftForm.
 */
class GiftForm
{
    public static function getDatas($page)
    {
        $data = [
            'gifts' => [
                [
                    'title' => 'Simply fill out the online form and choose the amount you want to spend.',
                    'subtitle' => 'The personalized GiftVoucher will be send to you per post. Our gift voucher.',
                ],
            ],
            'wedding' => [
                [
                    'title' => 'Simply fill out the online form and choose the amount you want to spend.',
                    'subtitle' => 'The personalized GiftVoucher will be send to you per post. Our gift voucher.',
                ],
            ],

            'class_reunion' => [
                [
                    'title' => 'Simply fill out the online form and choose the amount you want to spend.',
                    'subtitle' => 'The personalized GiftVoucher will be send to you per post. Our gift voucher.',
                ],
            ],
        ];

        if (array_key_exists($page, $data)) {
            return $data[$page];
        }
    }
}
