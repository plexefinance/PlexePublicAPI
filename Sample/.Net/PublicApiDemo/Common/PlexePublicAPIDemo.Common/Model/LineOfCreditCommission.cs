using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class LineOfCreditCommission
    {
        public double? upfrontFee { get; set; }
        public double? trailing { get; set; }
        public double? drawFee { get; set; }
    }
}