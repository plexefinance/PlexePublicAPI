using System;
namespace PlexePublicAPIDemo.Common.Model
{
    public class LoanTransaction
    {
        public DateTime Date { get; set; }

        public string Description { get; set; }

        public string Type { get; set; }

        public AmountResponse Amount { get; set; }

        public bool IsCredit { get; set; }

        public AmountResponse Balance { get; set; }
    }
}
