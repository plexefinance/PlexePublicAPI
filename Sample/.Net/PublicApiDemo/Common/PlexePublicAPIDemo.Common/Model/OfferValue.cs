using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class OfferValue
    {
        public string offerId { get; set; }
        public object facilityLimit { get; set; }
        public object creditLimit { get; set; }
        public Commission commission { get; set; }
        public bool secured { get; set; }
        public object decision { get; set; }
        public int loanType { get; set; }
        public object cashFlowLimit { get; set; }
        public object receivableLimit { get; set; }
    }
}