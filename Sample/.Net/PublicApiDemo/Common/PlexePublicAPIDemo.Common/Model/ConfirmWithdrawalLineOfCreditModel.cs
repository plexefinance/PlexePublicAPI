using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class ConfirmWithdrawalLineOfCreditModel
    {
        public double amount { get; set; }
        public bool priority { get; set; }
        public double percentageOfIncome { get; set; }
        public double weeklyPayment { get; set; }
        public double totalRepaymentAmount { get; set; }
        public DateTime nextRepaymentDate { get; set; }
        public double advanceRate { get; set; }
        public string otp { get; set; }
        public DateTime dateUTC { get; set; }
        public Commission commission { get; set; }
        public int terms { get; set; }
        public double fixedRepaymentFee { get; set; }
        public double fixedRepayment { get; set; }
    }
}
