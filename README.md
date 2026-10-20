# PrintInvoice User Guide

## Overview

PrintInvoice is an extension for Magento that adds a REST API endpoint
to generate invoice PDFs programmatically. The PDF is generated on
demand using Magento's native invoice rendering logic and does not
require any interaction with the Magento Admin.

The extension does not introduce configuration settings, frontend
components, or backend UI changes.

------------------------------------------------------------------------

## Installation

1.  Install the extension using Composer.

2.  Run the following Magento commands:

    bin/magento setup:upgrade bin/magento cache:flush

No additional configuration is required.

------------------------------------------------------------------------

## Configuration

This extension does not provide any configuration options.

There are:

-   No Admin settings
-   No frontend components
-   No system configuration entries
-   No additional database setup beyond installation

The API endpoint becomes available immediately after installation.

------------------------------------------------------------------------

## API Endpoint

Method: GET

Endpoint:

    /rest/{store_code}/V1/invoices/{invoiceId}/print

Example (default store view):

    /rest/default/V1/invoices/1/print

------------------------------------------------------------------------

## Required Parameter
| **Parameter** | **Required** | **Type** | **Description** |
|:-------------:|:------------:|:--------:|:---------------:|
| id            | required     | integer  | The invoice ID  |

------------------------------------------------------------------------

## Authentication

This endpoint requires standard Magento REST API authentication.

You may use:

-   Admin token
-   Integration token
-   OAuth

Example Authorization Header:

    Authorization: Bearer <access_token>

------------------------------------------------------------------------

## Step-by-Step Usage Example

### Step 1: Obtain an Admin Token

Request:

    POST /rest/V1/integration/admin/token

Body:

    {
      "username": "admin",
      "password": "admin_password"
    }

Response:

    <access_token>

------------------------------------------------------------------------

### Step 2: Request the Invoice PDF

    GET /rest/default/V1/invoices/1/print
    Authorization: Bearer <access_token>

------------------------------------------------------------------------

### Step 3: Example API Response

    {
      "id": 1,
      "pdf": "JVBERi0xLjQKJc..."
    }

-   id --- Invoice ID
-   pdf --- Base64-encoded PDF content

------------------------------------------------------------------------

### Step 4: Decode the PDF

Example in PHP:

    $response = json_decode($apiResponse, true);
    file_put_contents('invoice.pdf', base64_decode($response['pdf']));

------------------------------------------------------------------------

## Expected Behavior

-   The PDF is generated on demand.
-   The output matches the invoice PDF format used by Magento.
-   No manual Admin action is required.
-   The invoice does not need to be previously printed.

------------------------------------------------------------------------

## Notes

Screenshots may demonstrate requests using Postman for testing purposes.
Any REST client capable of making authenticated Magento API requests may
be used.

------------------------------------------------------------------------

## Compatibility

-   Magento Open Source
-   Adobe Commerce
