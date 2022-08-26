using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class ApplicationCommission
    {
        public double? upfrontFee { get; set; }
        public double? trailing { get; set; }
        public double? drawFee { get; set; }
    }
}