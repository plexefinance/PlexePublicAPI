using System.Collections.Generic;

namespace PlexePublicAPIDemo.Common.Model
{
    public class Datum
    {
        public string Label { get; set; }
        public string Details { get; set; }
        public object SubmittedDate { get; set; }
        public bool Submitted { get; set; }
        public List<object> Locations { get; set; }
        public string Id { get; set; }
    }

    public class RequiredDocumentResponse
    {
        public List<Datum> Data { get; set; }
        public int TotalCount { get; set; }
    }
}
