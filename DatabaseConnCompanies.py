import requests
from requests.auth import HTTPBasicAuth
import json

from Company import Company

class DatabaseConnFirmalar():
    my_auth = HTTPBasicAuth('user_here', 'pass_here')
    
    def addCompanyInformation(self, company):
        service_link = "http://tevhitkarsli.com/addCompanyInformation.php"

        my_data = {
            'CompanyID'		: 	company.getCompanyID(),
            'CompanyName'	: 	company.getCompanyName(),
            'CompanyNote'	: 	company.getCompanyNote()
        }

        myRequest = requests.post(url=service_link, data=my_data, auth=self.my_auth)

        # return: 'successful_operation' or 'unsuccessful_operation'
        return myRequest.text
    
    #---------------------------------------------------------------------------------------------
    
    
    def getCompanyInformation(self):
        service_link = "http://tevhitkarsli.com/getCompanyInformation.php"

        myRequest = requests.post(url=service_link, auth=self.my_auth)
        
        if str(myRequest.text) == '[]':
            return None

        companies_text = json.loads(myRequest.text)

	all_companies_list = []

	for i in range(0, len(companies_text)):
            company = Company(
            companies_text[0]['CompanyID'],
            companies_text[0]['CompanyName'],
            companies_text[0]['CompanyNote']
        	)
            
            all_companies_list.append(company)

        return all_companies_list
    
    #---------------------------------------------------------------------------------------------

    def setCompanyName(self, company_id, new_company_name):
        service_link = "http://tevhitkarsli.com/setCompanyName.php"
        
        my_data = {
            'CompanyID'		: 	company_id,
            'CompanyName'	: 	new_company_name
        }
        
        myRequest = requests.post(url=service_link, data=my_data, auth=self.my_auth)

        # return: 'successful_operation' or 'unsuccessful_operation'
        return myRequest.text
    
    #---------------------------------------------------------------------------------------------

    def deleteCompanyInformation(self, company_id):
        service_link = "http://tevhitkarsli.com/deleteCompanyInformation.php"
        
        my_data = {
            'CompanyID'	: company_id
        }
        
        myRequest = requests.post(url=service_link, data=my_data, auth=self.my_auth)

        # return: 'successful_operation' or 'unsuccessful_operation'
        return myRequest.text
    
    #---------------------------------------------------------------------------------------------