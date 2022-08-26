using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class TransactionRequest
    {

        public double? Amount { get; set; }
        public double? Balance { get; set; }
        public DateTime? Date { get; set; }
        public string Text { get; set; }
        public string Type { get; set; }
        public List<Tag> Tags { get; set; }
        public string Catgeory { get; set; }
    }
}