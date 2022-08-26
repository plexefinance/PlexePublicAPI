using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class ApplicationLocCalculation
    {
        public object contentType { get; set; }
        public object serializerSettings { get; set; }
        public object statusCode { get; set; }
        public ApplicationLocCalculationValue value { get; set; }
        

        public class ApplicationLocCalculationValue
        {
            public double advanceRate { get; set; }
            public double totalRepayment { get; set; }
            public double repayment { get; set; }
            public double advanceFee { get; set; }
            public int weeks { get; set; }
            public double amount { get; set; }
            public double percentOfIncome { get; set; }
            public int terms { get; set; }
            public bool fixedRepaymentCalculation { get; set; }
        }
    }
}
