<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class SocialStatus extends Enum
{
    const SINGLE   = 0;
    const MARIED   = 1;
    const WIDOW    = 2;
    const DIVORCED = 3;
}
