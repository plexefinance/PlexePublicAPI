using System.Collections.Generic;

namespace PlexePublicAPIDemo.Common.Model
{
    public class BankAccount
    {
        public string name { get; set; }
        public string accountNumber { get; set; }
        public string routingNumber { get; set; }
    }

    public class ContractDetailsResponse
    {
        public string companyName { get; set; }
        public string guarantors { get; set; }
        public double facilityLimit { get; set; }
        public string establishmentFee { get; set; }
        public string drawFee { get; set; }
        public List<BankAccount> bankAccounts { get; set; }
        public string platformAgreementHTML { get; set; }
        public string platformAgreementSignCondition1 { get; set; }
        public string platformAgreementSignCondition2 { get; set; }
    }
}