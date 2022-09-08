# The Plexe Public API

## API 

Plexe provides a simple HTTP-based API for creating applications and managing their line of credit products.

To inspect the Swagger Document, go to

https://apidemo.plexe.co/swagger/index.html

To create an account, please contact us at admin@plexe.co

## Proxy 

One of the fastest ways to connect to our API is to use a proxy generator. 

Review Autorest as one such tool


https://github.com/Azure/autorest

The swagger json can be found at

https://apidemo.plexe.co/swagger/v1/swagger.json

## Authentication

There are two types of users, customer and partner. 

A customer is the primary applicant on an application. The scope of their functionality is mostly for the management of the application and loan.

A partner is a user that is assigned to an application. They have some visibility over the Application details, but mostly to monitor the status of an application as it progresses throughout the application process.

To use the Authentication api, you will be required to login, supplying a username and password. This will return a Bearer token.

    {
		"firstName": "string",
		"lastName": "string",
		"id": "string",
		"email": "string",
		"username": "string",
		"userType": "string",
		"token": "string",
		"expiresUTC": "2022-07-15T05:02:39.865Z",
		"requiresTwoFactor": true
    }

This Bearer token will be required to be passed as a header on all the HTTP calls

     authorization: Bearer eyJhbGciOiJIUzI1NiIs....ARic
	 
If the token expires, you can either Refresh the token or relogin. 

Tokens last 60 mintues.


## Create A Customer

Before you can create an application, you need to create a customer.

This API call does not require authentication.

The required inputs are
 
    {
		"email": "string", (email address) (required)
		"firstName": "string", (firstName) (required)
		"lastName": "string", (lastName)  (required)
		"password": "string", (at least 6 char, 1 Upper, 1 number and 1 special char) (required)
		"number": "string" (cell phone number) (required)
	}


The return type is a Guid which is the customer's unquie ID

## Create An Application

To create an Appplication you will need to call the Create Application API, and pass in
  
	{
		"partnerId": "string", (Guid id of the partner) (optional)
		"customerId": "string", (Guid of customer id) (required)
		"businessName": 0, (business name) (optional)
		"firstName": "string" (first name) (required),
		"lastName": "string" (last name) (required),
		"mobile": 0, (mobile number) (required)
		"email": "string" (email) (required),
		"ExtraInformation" : {} (optional)
	}

Once the Application is created, then you will need to add in Accounting and Banking information


    /api/Application/add-or-update-accounting-data/{applicationId}
	
	/api/Application/add-or-update-banking-data/{applicationId}

Once data is added, then you can process the Applicaiton

    /api/Application/process-application/{applicationId}
	
At any point, the status of the Application can be accessed

	/api/Application/application-status/{applicationId}
	
The application offer can be accessed calling the api

	/api/Application/application-offer/{applicationId}
	
This call will return the results from the process


	{
		"availableFunds": 0, (funding limit)
		"availableLimit": 0, (master limit)
		"invoiceRepaymentEnabled": true,   (if invoice repayment enabled)
		"lineOfCreditRepaymentEnabled": true, (if Line of credit is enabled)
		"invoiceRepaymentAvailableFunds": 0, (Invoice funding limit)
		"lineOfCreditRepaymentAvailableFunds": 0 (Line of Credit funding limit)
	}

## Calculation

If an application is ready or for an existing loan, you can call the Calculation API to get repayment details for an withdrawal.

### Invoice

The invoice calculation API requires the Application Id and the amount to withdrawal.

The results from this call will be

	{
		"advanceRate": 0, (the advance rate)
		"totalRepayment": 0, (the total repayment)
		"repayment": 0, (not used)
		"advanceFee": 0, (the fee charged)
		"weeks": 0, (not used)
		"amount": 0, (amount entered)
		"percentOfIncome": 0, (not used)
		"terms": 0, (not used)
		"fixedRepaymentCalculation": true (not used)
	}


### Line of Credit

The line of credit calculation first requires the calculation slider API to be called. 

This enables the options for the percentage of income repayment to be used.

You only need to pass in the amount. 

The return type is a dictionary of 10 points with a percentage amount per item.

To call the line of credit calculation for a percentage of income, send the following

	{
		"amount": 0, (enter the amount)
		"percentOfIncome": 0, (set the percentage of income)
		"terms": 0, (not use)
		"fixedRepaymentCalculation": false (set to false)
	}

To call the fixed line of credit calculation, send the following


	{
		"amount": 0, (enter the amount)
		"percentOfIncome": 0, (not use)
		"terms": 0, (set term between 4 and 52)
		"fixedRepaymentCalculation": true (set to true)
	}

The result will be

	{
		"advanceRate": 0, (the advance rate)
		"totalRepayment": 0, (the total repayment)
		"repayment": 0, (the weekly repayment)
		"advanceFee": 0, (the fee charged)
		"weeks": 0, (number of weeks)
		"amount": 0, (amount entered)
		"percentOfIncome": 0, (returned if enteretd)
		"terms": 0, (returned if enteretd)
		"fixedRepaymentCalculation": true (returned if enteretd)
	}


## Application Approval

When an application is ready to be completed, it requires a number data collection steps

1. Add Organisation Details
2. Add Primary Applicant Details
3. Add Secondary Applicant Details (not mandatory)
4. Set Primary Bank Account
5. Sign Contract
6. Supplied Required Documents

Only when this is done will the application be submitted for review and approval.

### Add Organisation Details

Adding organisation details includes submitted the Application id with the following details

	{
		"businessName": "string", (the name of the business) (required)
		"entityType": "string", (the type of business, LLC, etc etc) (required)
		"zipCode": "string", (the zip code of the business) (required)
		"businessTaxId": "string", (the EIN of the business) (required)
		"city": "string" (the city the business is HQ) (required)
	} 

### Add Primary Applicant Details

To add the Primary Applicant, you will need to submit both Driver License and SSN details         

	{
		"name": "string", (optional)
		"email": "string", (required)
		"mobile": "string",  (required)
		"isPrimary": "string", (required)
		"isManuallyAdded": "string", (required)
		"driverLicense": {
			"name": "string", (required)
			"address": "string", (required)
			"city": "string", (required)
			"dateOfBirth": "2022-07-15T05:48:04.972Z", (required)
			"cardNumber": "string", (required)
			"issuingState": "string", (required)
			"expiryDate": "string", (required)
			"image": "string" (required)
		},
		"miscellaneousData": {} (optional)
	}

A Primary Applicant is required for an application to be completed.

### Add Secondary Applicant Details (not required)

To add the Secondary Applicant, you will need to submit both Driver License and SSN details

	{
		"name": "string", (optional)
		"email": "string", (required)
		"mobile": "string",  (required)
		"isPrimary": "string", (required)
		"isManuallyAdded": "string", (required)
		"driverLicense": {
			"name": "string", (required)
			"address": "string", (required)
			"city": "string", (required)
			"dateOfBirth": "2022-07-15T05:48:04.972Z", (required)
			"cardNumber": "string", (required)
			"issuingState": "string", (required)
			"expiryDate": "string", (required)
			"image": "string" (required)
		},
		"miscellaneousData": {} (optional)
	}

A Secondary Applicant is not required for an Application.

### Set Primary Bank Account

To select a Primary Bank account, you will need to first access the list of current Bank Accounts assigned to the customer.

	/api/ApplicationApproval/get-all-banks/{applicationId}

This will return a list Bank Accounts.

To select a Primary Account, you will need to pass in the Application Id and the Bank Account selected to the API


	/api/ApplicationApproval/set-primary-bank/{applicationId}

	post below bank data
	
	{
	  "selected": true, (required)
	  "name": "string", (required)
	  "accountNumber": "string", (required)
	  "id": "string", (required)
	  "bsb": "string", (required)
	  "balance": "string", (required)
	  "available": "string", (required)
	  "accountHolder": "string", (required)
	  "accountType": "string", (required)
	  "slug": "string", (required)
	  "enabled": true, (required)
	  "archived": true, (required)
	  "accountId": "string" (required)
	}


### Sign Contract

To sign the contract, you must display the contract details for the customer to review.

	/api/ApplicationApproval/get-contract/{applicationId}
	
This will return

	{
	  "companyName": "string", (the name of the company the contract is in)
	  "guarantors": "string", (list of applciants and addressess)
	  "facilityLimit": 0, (the master limit)
	  "establishmentFee": "string", (and fees)
	  "drawFee": "string", (and draw fees)
	  "bankAccounts": [  
		{
		  "bankId": "string",
		  "name": "string",
		  "accountNumber": "string",
		  "routingNumber": "string",
		  "balance": 0
		}
	  ],
	  "platformAgreementHTML": "string", (a HTML version of the Terms and Conditions)
	  "platformAgreementSignCondition1": "string", (Text for first signature)
	  "platformAgreementSignCondition2": "string"  (Text for second signature)
	}

You will then collect the electronic signature from the customer for condition 1 and 2 and called the 

		/api/ApplicationApproval/sign-contract/{applicationId}

Passing in the jpg of the signatures as a byte array.

	{
	  "ipAddress": "string", (required)
	  "signature": "string", (required)
	  "signature2": "string",(required)
	  "mimeType": "string", (required)
	  "secondaryApplicant": true (required)
	}


### Supplied Required Documents

The final step is to review what documents need to be collected. You do this by calling the API

	/api/ApplicationApproval/get-required-documents/{applicationId}
	
This will return a list of documents that need to be submitted.

Collect those documents and call the API

	/api/ApplicationApproval/submit-required-document/{applicationId}

Pass in the Document Id, the name and the byte array of the document.

This final action will trigger the processing of the Application.

## Loan

Once an application has been converted into a Loan, the customer can do the following

- Access their Loan, based on the customer Id
- Get Information about their Loan, like Transactions, Withdrawals, Contracts, etc
- Make a withdrawal


### Access Loan

A customer might have many Loans, so to access the Loans associated with a customer, you call

	/api/Loan/get-customer-loans/{customerId}
	
This will return a list of Loans for this customer.

Using that Id, you can now access the other data for that Loan.

### Loan Information

You can access the following information from the system about your Loan.

| Data     | Description | API|
| ----------- | ----------- |-----|
| Transactions | List of all transactions  | /api/Loan/get-transactions/{loanId}|
| Withdrawals | List of all withdrawals  | /api/Loan/get-withdrawals/{loanId}|
| Contract | List of contracts  | /api/Loan/get-contract-documents/{loanId}|
| Balance | Balance Details  | /api/Loan/get-total-balance/{loanId}|
| Balance Per Repayment Type | If you have mutiple products, you might have mutiple difference balances  | /api/Loan/get-repayment-balances/{loanId}}|


### Make a Withdrawal

To make a withdrawal, you will need to use the Calculation API to get details of the withdrawal.

Once that is complete, call the API

	/api/Loan/make-withdrawal/{loanId}
	
This API takes the output from the Calculation API as an input.

Onced called, a SMS will be generated and sent to the Cusomter's cell.

When received, the OTP will be passed to 

	/api/Loan/confirm-withdrawal/{loanId}/{otp}
	
The returning data will detail the status of the request, amount and any system notes.

If required, you can resend the OTP using

		/api/Loan/resend-withdrawal-otp/{loanId

## Bulk Customer and Application Creation

To allow for the bulk insertion of customers and Applications. There are APIs you can use.

To add many customers, call the API and pass in a collection of customer details

		/api/ApplicationBulk/create-customers


This will return a list of Ids, matched to the customer.


To add many Applications, call the API and pass in a collection of application requests.

		/api/ApplicationBulk/create-applications


This will return a list of Ids, matched to the Application.

## Webhooks

We provide several webhooks as notification for the following events

| Webhook     | Description |
| ----------- | ----------- |
| Customer Created for Partner      | This is a notification that a new customer has been created only for registered partners        |
| Application Created for Partner      | This is a notification that a new application has been created only for registered partners        |
| Customer and Application Created for Partner      | This is a notification that a new customer and application has been created only for registered partners        |
| Application Processed      | This is a notification that a new application has been processed for a partner        |
| Application Status Changed     | This is a notification that an application's status has changed only for registered partners        |
| Application Approval Status Changed     | This is a notification that an application's approval status has changed only for registered partners        |
| Loan Created     | This is a notification that an application has been converted into a loan        |
| Loan Withdrawal Completed     | This is a notification that withdrawal has completed      |
| New Message Posted     | This is a notification that a new message has been posted for a customer, application or loan        |

## Getting Help

If you need help using the API, please contact as at admin@plexe.co

If you have found a bug or would like new features added, either add an open issue or again contact us at admin@plexe.co

