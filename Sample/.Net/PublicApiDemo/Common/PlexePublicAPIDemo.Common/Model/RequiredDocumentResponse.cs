using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class Datum
    {
        public string label { get; set; }
        public string details { get; set; }
        public object submittedDate { get; set; }
        public bool submitted { get; set; }
        public List<object> locations { get; set; }
        public string id { get; set; }
    }

    public class RequiredDocumentResponse
    {
        public object contentType { get; set; }
        public object serializerSettings { get; set; }
        public object statusCode { get; set; }
        public RequiredDocumentResponseValue value { get; set; }
    }

    public class RequiredDocumentResponseValue
    {
        public List<Datum> data { get; set; }
        public int totalCount { get; set; }
    }

}
