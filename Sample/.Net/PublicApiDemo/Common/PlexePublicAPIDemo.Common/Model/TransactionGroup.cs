using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class TransactionGroup
    {
        public string Name { get; set; }
        public IList<AnalysisPoint> AnalysisPoints { get; set; }
        public IList<Transaction2> Transactions { get; set; }
    }
}