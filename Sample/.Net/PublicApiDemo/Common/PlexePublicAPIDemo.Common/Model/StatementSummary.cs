using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class StatementSummary
    {

        public string OpeningBalance { get; set; }
        public string TotalCredits { get; set; }
        public string TotalDebits { get; set; }
        public string ClosingBalance { get; set; }
        public string MinBalance { get; set; }
        public string MinDayEndBalance { get; set; }
        public int? DaysInNegative { get; set; }
        public string SearchPeriodStart { get; set; }
        public string SearchPeriodEnd { get; set; }
        public string TransactionsStartDate { get; set; }
        public string TransactionsEndDate { get; set; }
    }
}