using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class Commission
    {
        public object upfrontFee { get; set; }
        public object trailing { get; set; }
        public object drawFee { get; set; }
    }
}