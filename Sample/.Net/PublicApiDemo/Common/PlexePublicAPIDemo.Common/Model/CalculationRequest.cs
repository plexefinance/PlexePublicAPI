using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class CalculationRequest
    {
        public CalculationRequest()
        {

        }

        public CalculationRequest(CalculationRequest request)
        {
            this.Amount = request.Amount;
            this.PercentOfIncome = request.PercentOfIncome;
            this.Terms = request.Terms;
            this.FixedRepaymentCalculation = request.FixedRepaymentCalculation;
        }
        public double Amount { get; set; }

        public double PercentOfIncome { get; set; }

        public int Terms { get; set; }

        public bool FixedRepaymentCalculation { get; set; }
    }
}
