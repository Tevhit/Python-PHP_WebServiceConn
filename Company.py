class Company():
    def __init__(self, company_id = None, company_name = None, company_note = None):
        self.company_id = company_id
        self.company_name = company_name
        self.company_note = company_note
        
    def setCompanyID(self, company_id):
        self.company_id = company_id
    def getCompanyID(self):
        return self.company_id
    
    def setCompanyName(self, company_name):
        self.company_name = company_name
    def getCompanyName(self):
        return self.company_name
    
    def setCompanyNote(self, company_note):
        self.company_note = company_note
    def getCompanyNote(self):
        return self.company_note