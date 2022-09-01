using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class PrimaryBank
    {
        public string Name { get; set; }
        public string AccountNumber { get; set; }
        public string RoutingNumber { get; set; }
    }

    public class BankDetails
    {
        public PrimaryBank PrimaryBank { get; set; }
        public object ContactNumber { get; set; }
        public double AdvanceRate { get; set; }
        public object ApplicationId { get; set; }
        public DateTime FirstRepayment { get; set; }
        public bool Isfixed { get; set; }
        public string Id { get; set; }
        public object IsFirstAdavnce { get; set; }
        public string LoanId { get; set; }
        public double PercentageOfIncome { get; set; }
        public double TotalRepayment { get; set; }
        public double WeeklyForecastIncome { get; set; }
        public double WeeklyRepayment { get; set; }
        public int Weeks { get; set; }
        public double WithdrawAmount { get; set; }
        public object Otp { get; set; }
        public object Calculation { get; set; }
    }
}
