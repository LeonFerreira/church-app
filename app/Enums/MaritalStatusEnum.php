<?php

namespace App\Enums;

enum MaritalStatusEnum: string
{
    case SINGLE = 'Single';
    case MARRIED = 'Married';
    case DIVORCED = 'Divorced';
    case WIDOW = 'Widow';
    case SEPARATED = 'Separated';
}
