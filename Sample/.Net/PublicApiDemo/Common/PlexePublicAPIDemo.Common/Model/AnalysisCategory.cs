using System.Collections.Generic;
namespace PlexePublicAPIDemo.Common.Model
{
    public class AnalysisCategory
    {
        public string Name { get; set; }
        public List<AnalysisPoint> AnalysisPoints { get; set; }
        public List<TransactionGroup> TransactionGroups { get; set; }
    }
}