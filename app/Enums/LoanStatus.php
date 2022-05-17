<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class LoanStatus extends Enum
{
    const REJECTED =   0;
    const INPROGRESS =   1;
    const BRANCHREVIEW =   2;
    const PARTNERREVIEW =   3;
    const CREDITBRANCH =   4;
    const CENTERBRANCH =   5;
    const APPROVED = 6;
    const ASKTRANSFERMONY = 7;
    const ASKMIZACREDIT = 8;
    const TRANSFERMONY = 9;
    const MIZACREDIT = 10;
    const PRINTLOANDOCUMENT = 11;
    const DONE = 12;
}
