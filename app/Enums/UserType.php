<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserType extends Enum
{
    const ACCOUNTMANGER =   0;
    const PARTNER =   1;
    const BRANCHMANGER = 2;
    const CENTERMANGER = 3;
    const PARTNERUSER = 4;
    const ADMIN = 5;
}
