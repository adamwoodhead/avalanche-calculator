<?php

namespace App\Enums;

class DebtType extends Enum
{
    const REGULAR = 10;
    const BALANCE_TRANSFER = 20;
    const PURCHASE = 30;
    const SHORT_TERM_LOAN = 40;
    const LONG_TERM_LOAN = 50;
}
