using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class AnalysisCategory
    {
        public string Name { get; set; }
        public List<AnalysisPoint> AnalysisPoints { get; set; }
        public List<TransactionGroup> TransactionGroups { get; set; }
    }
}