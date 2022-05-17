<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static VIEWS()
 * @method static static RATE()
 * @method static static OptionThree()
 */
final class GlobalSortingKeys extends Enum
{
    const VIEWS = 'views';
    const RATE = 'rate';
    const CREATED_AT = 'created_at';
}
