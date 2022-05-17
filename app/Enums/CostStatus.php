<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CostStatus extends Enum
{
    const INVESTMENT =   0;
    const MONTHLY =   1;
    const MONTHLYREVEMT = 2;
}
