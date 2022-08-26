using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class ContractDocumentResponse
    {
        public object contentType { get; set; }
        public object serializerSettings { get; set; }
        public object statusCode { get; set; }
        public List<ContractDocumentResponseValue> value { get; set; }
    }

    public class ContractDocumentResponseValue
    {
        public string displayName { get; set; }
        public DateTime createdDate { get; set; }
        public string documentId { get; set; }
        public object data { get; set; }
        public int status { get; set; }
    }
}
