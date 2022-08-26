using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class Calculation
    {
        public double amount { get; set; }
        public double percentOfIncome { get; set; }
        public int terms { get; set; }
        public bool fixedRepaymentCalculation { get; set; }
    }
}
