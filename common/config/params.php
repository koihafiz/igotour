<?php
return [
    'adminEmail' => 'admin@igotour.services',
    'supportEmail' => 'support@igotour.services',
    'user.passwordResetTokenExpire' => 3600,
    'user_status' => [0 => 'Normal User', 1 => 'Master Buddy', 2 => 'Sub Master Buddy', 11 => 'System Admin'],
    'cart_status' => [0 => 'Just In Basket', 1 => 'Pending Payment', 2 => 'Success Payment'],
//   ----------------- Billplz Prod -----------------------
    'collection_id' => 'gh6dtokd',
    'api_secret_key' => '579943e0-9306-4783-b7fb-6b7e399974dd',
    'x_signature' => 'S-WSLHRvxU3ql2zkoGShG5jg',
    'billplz_api_link' => 'https://www.billplz.com/api/v3/bills',
    'billplz_payment_link' => 'https://billplz.com/bills',
//   ----------------- Billplz Staging --------------------
    'scollection_id' => 'jh6xebhy',
    'sapi_secret_key' => '75d6a496-728a-453e-970d-7f9af105704f',
    'sx_signature' => 'S-F9AbcoXBjOSEEPJQqBS9Fg',
    'sbillplz_api_link' => 'https://billplz-staging.herokuapp.com/api/v3/bills',
    'sbillplz_payment_link' => 'https://billplz-staging.herokuapp.com/bills',
];
