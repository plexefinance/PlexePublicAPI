using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class LoanBalanceResponse
    {
        public object contentType { get; set; }
        public object serializerSettings { get; set; }
        public object statusCode { get; set; }
        public LoanBalanceResponseValue value { get; set; }
    }

    public class LoanBalanceResponseValue
    {
        public double? AvailableFunds
        {
            get
            {
                return Math.Round((double)(TotalLimit - Balance), 2);
            }
        }

        public double? SystemPricing { get; set; }

        public double? Balance { get; set; }

        public double? TotalLimit
        {
            get
            {
                return RawTotal + Adjustment;
            }
        }

        public IDictionary<string, double?> Limits { get; set; }

        public double? RawTotal { get; set; }

        public double? Adjustment { get; set; }

        public double? TotalDebtors { get; set; }

        public double? TotalFundingRate { get; set; }

        public bool? IsDifferent(LoanBalanceResponseValue external)
        {
            if (AvailableFunds != external.AvailableFunds)
            {
                return true;
            }

            if (SystemPricing != external.SystemPricing)
            {
                return true;
            }

            if (Balance != external.Balance)
            {
                return true;
            }

            if (RawTotal != external.RawTotal)
            {
                return true;
            }

            if (TotalLimit != external.TotalLimit)
            {
                return true;
            }

            if (Adjustment != external.Adjustment)
            {
                return true;
            }

            if (TotalDebtors != external.TotalDebtors)
            {
                return true;
            }

            if (TotalFundingRate != external.TotalFundingRate)
            {
                return true;
            }

            if (Limits.Count != external.Limits.Count)
            {
                return true;
            }

            return false;
        }
    }
}
