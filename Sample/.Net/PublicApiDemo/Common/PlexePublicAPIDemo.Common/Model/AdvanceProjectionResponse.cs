using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{

    public class AdvanceProjectionResponse
    {

        public int? Terms { get; set; }
        public bool? Priority { get; set; }
        public double? Percentage { get; set; }
        public int? Weeks { get; set; }
        public string Name { get; set; }
        public bool? EarlyRepaid { get; set; }
        public DateTime? EarlyRepaidDate { get; set; }
        public DateTime? OverrideLastRepaymentDateUTC { get; set; }
        public bool? OverrideLastRepayment { get; set; }
        public bool? Legacy { get; set; }
        public bool? MonthlyFee { get; set; }
        public ApplicationCommission Commission { get; set; }
        public bool? FixedProperty { get; set; }
        public double? AdvanceRate { get; set; }
        public double? WeeklyPayment { get; set; }
        public double? TotalRepaymentAmount { get; set; }
        public DateTime? LastRepaymentDateUTC { get; set; }
        public string LastRepaymentDay { get; set; }
        public string NextRepaymentDay { get; set; }
        public string ActualNextRepaymentDay { get; set; }
        public DateTime? ActualNextRepaymentDateUTC { get; }
        public DateTime? NextRepaymentDateUTC { get; set; }
        public AmountResponse NextRepaymentValue { get; set; }
        public AmountResponse Remaining { get; set; }
        public AmountResponse Amount { get; set; }
        public string Details { get; set; }
        public string Type { get; set; }
        public DateTime? DateUTC { get; set; }
        public Guid? LoanId { get; set; }
        public Guid? Id { get; set; }
        public double? FixedRepayment { get; set; }
        public double? FixedRepaymentFee { get; set; }
    }
}
