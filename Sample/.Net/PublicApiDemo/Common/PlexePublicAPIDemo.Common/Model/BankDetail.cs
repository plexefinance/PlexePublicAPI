using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class BankDetail
    {
        public object contentType { get; set; }
        public object serializerSettings { get; set; }
        public object statusCode { get; set; }
        public List<BankDetailValue> value { get; set; }
    }

    public class BankDetailValue
    {
        public string accountRouting { get; set; }
        public string accountNumber { get; set; }
        public string name { get; set; }
        public string organisationId { get; set; }
    }
}
