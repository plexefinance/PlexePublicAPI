using System;
namespace PlexePublicAPIDemo.Common.Model
{
    public class ConfirmWithdrawalLineOfCreditModel
    {
        public double Amount { get; set; }
        public bool Priority { get; set; }
        public double PercentageOfIncome { get; set; }
        public double WeeklyPayment { get; set; }
        public double TotalRepaymentAmount { get; set; }
        public DateTime NextRepaymentDate { get; set; }
        public double AdvanceRate { get; set; }
        public string Otp { get; set; }
        public DateTime DateUTC { get; set; }
        public Commission Commission { get; set; }
        public int Terms { get; set; }
        public double FixedRepaymentFee { get; set; }
        public double FixedRepayment { get; set; }
    }
}
