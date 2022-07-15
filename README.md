# The Plexe Public API

## API 

Plexe provides a simple HTTP-based API for creating applications and managing their line of credit prodouct.

To inspect the Swagger Document goto

https://apidemo.plexe.co/swagger/index.html

To create an account, please contact us at team@plexe.co

## Proxy

One of the fastest ways to connect to our API is to use proxy generators. 

Plexe recommends using Autorest

https://github.com/Azure/autorest

## Authenication

There are two types of user Customer and Partner. 

A Customer is the primary applicant on an application. The scope of their functionaility is mostly for the managment of the applicaiton and loan.

A Partner is a user that is assigned to an application. They have some visibility over the application details, but mostly to monitor the status of an application as it progresses throught the application process.

To use the Authenication api, you will be required to login, supplying a username and password. This will return a token.

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

This Bearer token will be required to be passed has a header on all the HTTP call

     authorization: Bearer eyJhbGciOiJIUzI1NiIs....ARic
	 
If the token expires, you can either Refresh the token or relogin. 

Tokens last 60 minues

## Create A Customer

## Create An Application

## Access Loan

## Bulk Customer and Application Creation

## Webhooks

We provide a number of webhooks as notification for the following events

| Webhook     | Description |
| ----------- | ----------- |
| Customer Created for Partner      | This is notification that a new customer has been created only for registered partners        |
| Application Created for Partner      | This is notification that a new application has been created only for registered partners        |
| Customer and Application Created for Partner      | This is notification that a new customer and application has been created only for registered partners        |
| Application Processed      | This is notification that a new application has been processed for a partner        |
| Application Status Changed     | This is notification that an application's status has changed only for registered partners        |
| Application Approval Status Changed     | This is notification that an application's approval status has changed only for registered partners        |
| Loan Created     | This is notification that an application has been converted into a loan        |
| Loan Withdrawal Completed     | This is notification that withdrawal has completed      |
| New Message Posted     | This is notification that a new message has been posted for an customer, application or loan        |

## Getting Help

If you need help using the API, please contact as at team@plexe.co

If you have found a bug or would like new features added, either add an open issue or again contact us at team@plexe.co

