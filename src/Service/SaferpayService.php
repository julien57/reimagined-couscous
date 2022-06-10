<?php

namespace App\Service;

class SaferpayService
{
    public function getLink(int $price)
    {
        switch ($price) {
            case 50:
                return 'https://www.saferpay.com/vt2/Pay.aspx?DATA=%3cIDP+MSGTYPE%3d%22PayInit%22+ACCOUNTID%3d%22600513-17819334%22+NOTIFYADDRESS%3d%22info%40parc-hotel.lu%22+AMOUNT%3d%225000%22+CURRENCY%3d%22EUR%22+KEYID%3d%22%24IDP-600513%22+DESCRIPTION%3d%22Bon+cadeau+50+%e2%82%ac%22+BACKLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+SUCCESSLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+FAILLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+EXPIRATION%3d%2220261216000000%22+DELIVERY%3d%22yes%22+ALLOWCOLLECT%3d%22no%22+%2f%3e&SIGNATURE=1cd8652586d1f63d90c123332b972729732491eb31b0888d2fb51496ad71f26a53491ffa998d573681256c44513d586b6f037d222dcd0038ceb17bb831ccabfb';
                break;
            case 75:
                return 'https://www.saferpay.com/vt2/Pay.aspx?DATA=%3cIDP+MSGTYPE%3d%22PayInit%22+ACCOUNTID%3d%22600513-17819334%22+NOTIFYADDRESS%3d%22info%40parc-hotel.lu%22+AMOUNT%3d%227500%22+CURRENCY%3d%22EUR%22+KEYID%3d%22%24IDP-600513%22+DESCRIPTION%3d%22Bon+cadeau+75+%e2%82%ac%22+BACKLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+SUCCESSLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+FAILLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+EXPIRATION%3d%2220261216000000%22+DELIVERY%3d%22yes%22+ALLOWCOLLECT%3d%22no%22+%2f%3e&SIGNATURE=069c95bc64607790c6c86d2ffaeab93ef664a822a8a2ab64df4912cbd42d95bb1c9f204d4110a40ea5da58589809a42a8dd1f5e01c7b7f8e228e1c59c07d5e0c';
                break;
            case 100:
                return 'https://www.saferpay.com/vt2/Pay.aspx?DATA=%3cIDP+MSGTYPE%3d%22PayInit%22+ACCOUNTID%3d%22600513-17819334%22+NOTIFYADDRESS%3d%22info%40parc-hotel.lu%22+AMOUNT%3d%2210000%22+CURRENCY%3d%22EUR%22+KEYID%3d%22%24IDP-600513%22+DESCRIPTION%3d%22Bon+cadeau+100+%e2%82%ac%22+BACKLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+SUCCESSLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+FAILLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+EXPIRATION%3d%2220261216000000%22+DELIVERY%3d%22yes%22+ALLOWCOLLECT%3d%22no%22+%2f%3e&SIGNATURE=6eb93f2606a599e2b4cc60242ec11f4dfa9df051bdfe25c3e53e624f04057f9430d0f6be915393e2d268b458717fc34e42c2569fc461e80826fddafe197f0f3b';
                break;
            case 125:
                return 'https://www.saferpay.com/vt2/Pay.aspx?DATA=%3cIDP+MSGTYPE%3d%22PayInit%22+ACCOUNTID%3d%22600513-17819334%22+NOTIFYADDRESS%3d%22info%40parc-hotel.lu%22+AMOUNT%3d%2212500%22+CURRENCY%3d%22EUR%22+KEYID%3d%22%24IDP-600513%22+DESCRIPTION%3d%22Bon+cadeau+125+%e2%82%ac%22+BACKLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+SUCCESSLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+FAILLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+EXPIRATION%3d%2220261216000000%22+DELIVERY%3d%22yes%22+ALLOWCOLLECT%3d%22no%22+%2f%3e&SIGNATURE=6d9297f4585ca5c191a434dfb7f2255580e3e2181ab9fd4d6904362009210bcbc7925138ea1790d5f434f761d138c2f575808d187e3f35843f8faf53e30b32ca';
                break;
            case 150:
                return 'https://www.saferpay.com/vt2/Pay.aspx?DATA=%3cIDP+MSGTYPE%3d%22PayInit%22+ACCOUNTID%3d%22600513-17819334%22+NOTIFYADDRESS%3d%22info%40parc-hotel.lu%22+AMOUNT%3d%2215000%22+CURRENCY%3d%22EUR%22+KEYID%3d%22%24IDP-600513%22+DESCRIPTION%3d%22Bon+cadeau+150+%e2%82%ac%22+BACKLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+SUCCESSLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+FAILLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+EXPIRATION%3d%2220261216000000%22+DELIVERY%3d%22yes%22+ALLOWCOLLECT%3d%22no%22+%2f%3e&SIGNATURE=545b40d8f3bf4d33c50f2e7bbcafe9cf33c0b4c6196cb696348e2fe703505bc341f0925304dfd1a9c6754123a4c455c652938a858f65bb3cfb8b76580366c9a7';
                break;
            case 175:
                return 'https://www.saferpay.com/vt2/Pay.aspx?DATA=%3cIDP+MSGTYPE%3d%22PayInit%22+ACCOUNTID%3d%22600513-17819334%22+NOTIFYADDRESS%3d%22info%40parc-hotel.lu%22+AMOUNT%3d%2217500%22+CURRENCY%3d%22EUR%22+KEYID%3d%22%24IDP-600513%22+DESCRIPTION%3d%22Bon+cadeau+175+%e2%82%ac%22+BACKLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+SUCCESSLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+FAILLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+EXPIRATION%3d%2220261216000000%22+DELIVERY%3d%22yes%22+ALLOWCOLLECT%3d%22no%22+%2f%3e&SIGNATURE=8ee5001f406abb464b277536b8928cdde21fa4c2964ad39ec6403f6d99decff0ac038ecb829bfd8e0cf699b1d83977d0a877067823a124409b1482e4bf7b0e22';
                break;
            case 200:
                return 'https://www.saferpay.com/vt2/Pay.aspx?DATA=%3cIDP+MSGTYPE%3d%22PayInit%22+ACCOUNTID%3d%22600513-17819334%22+NOTIFYADDRESS%3d%22info%40parc-hotel.lu%22+AMOUNT%3d%2220000%22+CURRENCY%3d%22EUR%22+KEYID%3d%22%24IDP-600513%22+DESCRIPTION%3d%22Bon+cadeau+200+%e2%82%ac%22+BACKLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+SUCCESSLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+FAILLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+EXPIRATION%3d%2220261220000000%22+DELIVERY%3d%22yes%22+ALLOWCOLLECT%3d%22no%22+%2f%3e&SIGNATURE=30d8214f6028b14d437121a530844fdb5be5bcad401b9677c1cd28f83f58a775459b8369cd2edf8709e3c758a6f9bbf0ccb2c19828864786742b948a425c9136';
                break;
            case 225:
                return 'https://www.saferpay.com/vt2/Pay.aspx?DATA=%3cIDP+MSGTYPE%3d%22PayInit%22+ACCOUNTID%3d%22600513-17819334%22+NOTIFYADDRESS%3d%22info%40parc-hotel.lu%22+AMOUNT%3d%2222500%22+CURRENCY%3d%22EUR%22+KEYID%3d%22%24IDP-600513%22+DESCRIPTION%3d%22Bon+cadeau+225+%e2%82%ac%22+BACKLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+SUCCESSLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+FAILLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+EXPIRATION%3d%2220261216000000%22+DELIVERY%3d%22yes%22+ALLOWCOLLECT%3d%22no%22+%2f%3e&SIGNATURE=7225cea7751142632e66a3d6987afe57bc999e2b9520921fed676970ce6e7d0e3fe6b4afd29d322088bf34ae8ec0986fcacd5e394a5a0b8054c09b98627f6a41';
                break;
            case 250:
                return 'https://www.saferpay.com/vt2/Pay.aspx?DATA=%3cIDP+MSGTYPE%3d%22PayInit%22+ACCOUNTID%3d%22600513-17819334%22+NOTIFYADDRESS%3d%22info%40parc-hotel.lu%22+AMOUNT%3d%2225000%22+CURRENCY%3d%22EUR%22+KEYID%3d%22%24IDP-600513%22+DESCRIPTION%3d%22Bon+cadeau+250+%e2%82%ac%22+BACKLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+SUCCESSLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+FAILLINK%3d%22http%3a%2f%2fwww.parc-hotel.lu%22+EXPIRATION%3d%2220261216000000%22+DELIVERY%3d%22yes%22+ALLOWCOLLECT%3d%22no%22+%2f%3e&SIGNATURE=4c9fcc544d040551a75acc8d111bcb789c5252a7f311c00c7354d2f8dda85e4b48e6387cb537a0b59bd04ddccbc63879f32392d1864079fbafbe69b9072d4efb';
                break;
        }
    }
}
