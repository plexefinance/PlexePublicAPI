# The Plexe Public API Library

# Overview

These are set of libraries created in .NET and PHP to demonstrate usage of public API hosted at https://apidemo.plexe.co/ .

Below is a set of the four major workflows you will use in these libraries.

## Scenario First: Create an Application for Evaluation

![image](https://user-images.githubusercontent.com/1689816/188068744-13cd088f-f437-44a6-98d6-8af073b4767b.png)

## Scenario Second: Process Application for KYC

![image](https://user-images.githubusercontent.com/1689816/188068797-8ab5d496-df9a-48fe-937f-9990b25e608b.png)

## Scenario Third: Display Loan Details

![image](https://user-images.githubusercontent.com/1689816/188068840-68a07686-e5a7-4330-be05-89482d92e797.png)

## Scenario Fourth: Make Withdrawal

![image](https://user-images.githubusercontent.com/1689816/188068963-446458f1-7ba9-4168-b8d0-46e2f97fa208.png)

# .NET Library

## Overview
This is .Net library located at 
	PlexePublicAPI/Sample/.Net/PublicApiDemo/

## Software Requirements.

1. Latest visual studio.
2. .Net core run time SDK 2.0.

## Steps to run this library.

Download project located at 
	PlexePublicAPI/Sample/.Net/PublicApiDemo/

## Four screnarios mentioned above have separate project that can be run individually.

A. Scenario First:
  Located at 
	PlexePublicAPI/Sample/.Net/PublicApiDemo/ScenarioOne/PlexePublicAPIDemo.ScenarioOne/PlexePublicAPIDemo.ScenarioOne

B. Scenario Second:
  Located at 
	PlexePublicAPI/Sample/.Net/PublicApiDemo/ScenarioTwo/PlexePublicAPIDemo.ScenarioTwo/PlexePublicAPIDemo.ScenarioTwo

C. Scenario Third:
  Located at 
	PlexePublicAPI/Sample/.Net/PublicApiDemo/ScenarioThree/PlexePublicAPIDemo.ScenarioThree/PlexePublicAPIDemo.ScenarioThree

D. Scenario Fourth:
  Located at 
	PlexePublicAPI/Sample/.Net/PublicApiDemo/ScenarioFour/PlexePublicAPIDemo.ScenarioFour/PlexePublicAPIDemo.ScenarioFour

## Open any project as per your scenario that you want to run in visual studio.

![image](https://user-images.githubusercontent.com/1689816/188071961-3e121bf9-8d0e-4845-a91c-ded09af7d31f.png)
	
## Select intended project in visual studio as shown in below image and hit button.
	
## That will open console window where you can start entering input and see results step by step as mentioned in workflow.

# PHP Library

## Overview
This is PHP library located at 
	PlexePublicAPI/Sample/Php/PublicApiDemo/

## Software Requirements.

1. Latest PHP version installed.
2. Xamp Server to run php websites.
3. Any editor like notepad, sublimetext, visual studio code.

## Steps to run this library.

### 1. Download project located at PlexePublicAPI/Sample/Php/PublicApiDemo/

Four screnarios mentioned above have separate php file that can be run individually.

A. Scenario First:
  Located at 
	PlexePublicAPI/Sample/Php/PublicApiDemo/scenario-first.php

B. Scenario Second:
  Located at 
	PlexePublicAPI/Sample/Php/PublicApiDemo/scenario-second.php

C. Scenario Third:
  Located at 
	PlexePublicAPI/Sample/Php/PublicApiDemo/scenario-third.php

D. Scenario Fourth:
  Located at 
      PlexePublicAPI/Sample/Php/PublicApiDemo/scenario-fourth.php

### 2. Install and run xampp server at local.
![image](https://user-images.githubusercontent.com/1689816/188075645-71fe2b3f-8687-483a-b323-1b2b602a7b8e.png)

### 3. Copy code located at PlexePublicAPI/Sample/Php/ inside htdocs folder as shown.

![image](https://user-images.githubusercontent.com/1689816/188075811-3e6034e7-e3b9-4e67-8485-08faecaf91c3.png)
    
### 4. Set port at xampp

  1. Open config as shown below:
  ![image](https://user-images.githubusercontent.com/1689816/188076365-e263164d-6c3b-477c-b91f-3de3c74824df.png)

  2. Search Listen word in httpd.config opened in above step and change its value to 88 as shown below:

  ![image](https://user-images.githubusercontent.com/1689816/188076507-7fad8003-b8e7-4a0c-8ff0-c05fdabaacf4.png)

  3. Test your xamp server website location by running http://localhost:88/PublicApiDemo/scenario-first.php , below screen should appear.
  ![image](https://user-images.githubusercontent.com/1689816/188076121-c7640b48-6e6c-4e98-8dcf-df65ead52bb5.png)

## Run scenario as per your requirement as below

	A. Scenario First: http://localhost:88/PublicApiDemo/scenario-first.php

	B. Scenario Second: http://localhost:88/PublicApiDemo/scenario-second.php

	C. Scenario Third: http://localhost:88/PublicApiDemo/scenario-third.php

	D. Scenario Fourth: http://localhost:88/PublicApiDemo/scenario-fourth.php


## Getting Help

If you need help using the API Library of .NET or PHP, please contact as at admin@plexe.co

If you have found a bug or would like new features added, either add an open issue or again contact us at admin@plexe.co





