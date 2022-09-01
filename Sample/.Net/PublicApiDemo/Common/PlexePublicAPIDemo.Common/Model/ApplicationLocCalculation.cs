namespace PlexePublicAPIDemo.Common.Model
{
    public class ApplicationLocCalculation
    {
        public double AdvanceRate { get; set; }
        public double TotalRepayment { get; set; }
        public double Repayment { get; set; }
        public double AdvanceFee { get; set; }
        public int Weeks { get; set; }
        public double Amount { get; set; }
        public double PercentOfIncome { get; set; }
        public int Terms { get; set; }
        public bool FixedRepaymentCalculation { get; set; }
    }
}
