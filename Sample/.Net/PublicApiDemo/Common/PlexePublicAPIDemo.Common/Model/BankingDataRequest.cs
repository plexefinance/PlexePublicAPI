using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{

    public class BankingDataRequest
    {
        public List<BankAccountRequest> BankAccounts { get; set; }
    }
}