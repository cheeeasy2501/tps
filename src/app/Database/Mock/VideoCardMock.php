<?php

namespace App\Database\Mock;
trait VideoCardMock
{
    public function videoCardMock(): array
    {
        return [
            'RTX 4090',
            'RTX 4080',
            'RTX 4070 Ti',
            'RTX 4070 Super',
            'RTX 4070',
            'RTX 4060',
            '7900 XTX',
            '7900 XT',
            '7800 XT',
            '7800',
            '7700 XT',
            '7600 XT',
        ];
    }
}
