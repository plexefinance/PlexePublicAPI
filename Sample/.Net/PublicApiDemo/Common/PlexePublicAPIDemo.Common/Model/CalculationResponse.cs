using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class CalculationResponse : CalculationRequest
    {
        public CalculationResponse()
        {
        }

        public CalculationResponse(CalculationRequest request) : base(request)
        {
        }

        public double AdvanceRate { get; set; }

        public double TotalRepayment { get; set; }

        public double Repayment { get; set; }

        public double AdvanceFee { get; set; }

        public int Weeks { get; set; }

    }
}
