<?php

/**
 * Braspag PHP SDK
 *
 * @link https://github.com/JotJunior/BraspagPhpSdk for the canonical source repository
 * @copyright Copyright (c) 2016 JotJunior
 *
 * This file is part of Braspag-PHP-SDK.
 *
 * Braspag PHP SDK is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Braspag-PHP-SDK is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Braspag-PHP-SDK. If not, see <http://www.gnu.org/licenses/>.
 */

return [
    'merchantId' => '00000000-0000-0000-0000-000000000000',
    'merchantKey' => '0000000000000000000000000000000000000000',
    'apiUri' => 'https://apisandbox.braspag.com.br/v2',
    'apiQueryUri' => 'https://apiquerysandbox.braspag.com.br/v2',
    'currency' => 'BRL',
    'country' => 'BRA',
    'interest' => 'ByMerchant',
    'capture' => true,
    'authenticate' => false,
    'sequence' => 'AuthorizeFirst',
    'sequenceCriteria' => 'OnSuccess',
    'reasonCodes' => [
        0 => 'Successful',
        1 => 'AffiliationNotFound',
        2 => 'IssuficientFunds',
        3 => 'CouldNotGetCreditCard',
        4 => 'ConnectionWithAcquirerFailed',
        5 => 'InvalidTransactionType',
        6 => 'InvalidPaymentPlan',
        7 => 'Denied',
        8 => 'Scheduled',
        9 => 'Waiting',
        10 => 'Authenticated',
        11 => 'NotAuthenticated',
        12 => 'ProblemsWithCreditCard',
        13 => 'CardCanceled',
        14 => 'BlockedCreditCard',
        15 => 'CardExpired',
        16 => 'AbortedByFraud',
        17 => 'CouldNotAntifraud',
        18 => 'TryAgain',
        19 => 'InvalidAmount',
        20 => 'ProblemsWithIssuer',
        21 => 'InvalidCardNumber',
        22 => 'TimeOut',
        23 => 'CartaoProtegidoIsNotEnabled',
        24 => 'PaymentMethodIsNotEnabled',
        98 => 'InvalidRequest',
        99 => 'InternalError',
    ],
    'statusCodes' => [
        0 => 'NotFinished',
        1 => 'Authorized',
        2 => 'PaymentConfirmed',
        3 => 'Denied',
        10 => 'Voided',
        11 => 'Refunded',
        12 => 'Pending',
        13 => 'Aborted',
        20 => 'Scheduled',
    ]
];

