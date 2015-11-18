<?php
require_once __DIR__ . '/../../AvangateJsonrpcClient.php';

use \AvangateJsonrpcClient as Client;

/**
 * Initialize client
 */
Client::setBaseUrl('https://api.avangate.com/rpc/3.0/');
Client::setCredentials('APITEST', 'SECRET_KEY');

/**
 * Prepare call
 */
$productData = [
    'ProductCode' => 'PRODUCT_TEST_' . uniqid(),
    'ProductType' => 'REGULAR',
    'ProductName' => 'AV | Team',
    'ProductVersion' => '',
    'GroupName' => 'General',
    'ShippingClass' => null,
    'GiftOption' => false,
    'ShortDescription' => '',
    'LongDescription' => '',
    'SystemRequirements' => '',
    'ProductCategory' => false,
    'Platforms' => [],
    'ProductImages' => [],
    'TrialUrl' => '',
    'TrialDescription' => '',
    'Enabled' => true,
    'AdditionalFields' => [],
    'Translations' => [],
    'PricingConfigurations' => [
        [
            'Name' => 'AV | Price Configuration',
            'Code' => '54BCEB100D',
            'Default' => true,
            'BillingCountries' => [],
            'PricingSchema' => 'DYNAMIC',
            'PriceType' => 'NET',
            'DefaultCurrency' => 'USD',
            'Prices' => [
                'Regular' => [
                    [
                        'Amount' => 39.99,
                        'Currency' => 'USD',
                        'MinQuantity' => '1',
                        'MaxQuantity' => '99999',
                        'OptionCodes' => []
                    ]
                ],
                'Renewal' => []
            ],
            'PriceOptions' => []
        ]
    ],
    'Prices' => [],
    'BundleProducts' => [],
    'Fulfillment' => 'BY_VENDOR',
    'GeneratesSubscription' => true,
    'SubscriptionInformation' => [
        'DeprecatedProducts' => [],
        'BundleRenewalManagement' => 'GLOBAL',
        'BillingCycle' => '-1',
        'BillingCycleUnits' => 'M',
        'IsOneTimeFee' => true,
        'ContractPeriod' => null,
        'UsageBilling' => 0,
        'GracePeriod' => null,
        'RenewalEmails' => [
            'Type' => 'GLOBAL',
            'Settings' => [
                'ManualRenewal' => [
                    'Before30Days' => false,
                    'Before15Days' => false,
                    'Before7Days' => true,
                    'Before1Day' => false,
                    'OnExpirationDate' => false,
                    'After5Days' => false,
                    'After15Days' => false
                ],
                'AutomaticRenewal' => [
                    'Before30Days' => false,
                    'Before15Days' => false,
                    'Before7Days' => true,
                    'Before1Day' => false,
                    'OnExpirationDate' => false,
                    'After5Days' => false,
                    'After15Days' => false
                ]
            ]
        ]
    ],
    'FulfillmentInformation' => [
        'IsStartAfterFulfillment' => false,
        'IsElectronicCode' => false,
        'IsDownloadLink' => false,
        'IsBackupMedia' => false,
        'IsDownloadInsuranceService' => false,
        'IsInstantDeliveryThankYouPage' => true,
        'IsDisplayInPartnersCPanel' => false,
        'CodeList' => null,
        'BackupMedia' => null,
        'ProductFile' => null,
        'AdditionalInformationByEmail' => 'install instructions',
        'AdditionalInformationEmailTranslations' => [
            [
                'Name' => null,
                'Description' => 'install instructions french',
                'Language' => 'FR'
            ],
            [
                'Name' => null,
                'Description' => 'install instructions japanese',
                'Language' => 'JA'
            ]
        ]
    ]
];

$responseAddProduct = Client::addProduct($productData);

var_dump($responseAddProduct);
// output:
// bool(true)

/**
 * Get added product details
 */
$productDetails = Client::getProductByCode($productData['ProductCode']);
echo json_encode($productDetails, JSON_PRETTY_PRINT);

// output:
// {
//     "AvangateId": "4590126",
//     "ProductCode": "PRODUCT_TEST_564c9968d3d45",
//     "ProductType": "REGULAR",
//     "ProductName": "AV | Team",
//     "ProductVersion": "",
//     "GroupName": "General",
//     "ShippingClass": null,
//     "GiftOption": false,
//     "ShortDescription": "",
//     "LongDescription": "",
//     "SystemRequirements": "",
//     "ProductCategory": false,
//     "Platforms": [],
//     "ProductImages": [],
//     "TrialUrl": "",
//     "TrialDescription": "",
//     "Enabled": true,
//     "AdditionalFields": [],
//     "Translations": [],
//     "PricingConfigurations": [
//         {
//             "Name": "AV | Price Configuration",
//             "Code": "564C996A5E",
//             "Default": false,
//             "BillingCountries": [],
//             "PricingSchema": "DYNAMIC",
//             "PriceType": "NET",
//             "DefaultCurrency": "USD",
//             "Prices": {
//                 "Regular": [
//                     {
//                         "Amount": 39.99,
//                         "Currency": "USD",
//                         "MinQuantity": "1",
//                         "MaxQuantity": "99999",
//                         "OptionCodes": []
//                     }
//                 ],
//                 "Renewal": []
//             },
//             "PriceOptions": []
//         }
//     ],
//     "Prices": [],
//     "BundleProducts": [],
//     "Fulfillment": "BY_VENDOR",
//     "GeneratesSubscription": true,
//     "SubscriptionInformation": {
//         "DeprecatedProducts": [],
//         "BundleRenewalManagement": "GLOBAL",
//         "BillingCycle": "-1",
//         "BillingCycleUnits": "M",
//         "IsOneTimeFee": true,
//         "ContractPeriod": null,
//         "UsageBilling": 0,
//         "GracePeriod": null,
//         "RenewalEmails": {
//             "Type": "GLOBAL",
//             "Settings": {
//                 "ManualRenewal": {
//                     "Before30Days": true,
//                     "Before15Days": true,
//                     "Before7Days": true,
//                     "Before1Day": false,
//                     "OnExpirationDate": true,
//                     "After5Days": false,
//                     "After15Days": false
//                 },
//                 "AutomaticRenewal": {
//                     "Before30Days": false,
//                     "Before15Days": false,
//                     "Before7Days": true,
//                     "Before1Day": false,
//                     "OnExpirationDate": false,
//                     "After5Days": false,
//                     "After15Days": false
//                 }
//             }
//         }
//     },
//     "FulfillmentInformation": {
//         "IsStartAfterFulfillment": false,
//         "IsElectronicCode": false,
//         "IsDownloadLink": false,
//         "IsBackupMedia": false,
//         "IsDownloadInsuranceService": false,
//         "IsInstantDeliveryThankYouPage": true,
//         "IsDisplayInPartnersCPanel": false,
//         "CodeList": null,
//         "BackupMedia": null,
//         "ProductFile": null,
//         "AdditionalInformationByEmail": "install instructions",
//         "AdditionalInformationEmailTranslations": [],
//         "AdditionalThankYouPage": null,
//         "AdditionalThankYouPageTranslations": []
//     }
// }
//
