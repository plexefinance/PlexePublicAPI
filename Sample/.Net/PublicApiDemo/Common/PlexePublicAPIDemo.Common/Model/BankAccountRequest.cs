using System.Collections.Generic;
namespace PlexePublicAPIDemo.Common.Model
{ 
    public class BankAccountRequest
    {
        public string AvailableBalance { get; set; }
        public string CurrentBalance { get; set; }
        public string AccountNumber { get; set; }
        public string Routing { get; set; }
        public string AccountType { get; set; }
        public string Bank { get; set; }
        public string Id { get; set; }
        public List<TransactionRequest> Transactions { get; set; }
        public string AccountName { get; set; }
        public string AccountHolder { get; set; }
    }

}