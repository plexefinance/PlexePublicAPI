using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class Transaction2
    {
        public DateTime? Date { get; set; }
        public string Text { get; set; }
        public double? Amount { get; set; }
        public string Type { get; set; }
        public double? Balance { get; set; }
        public List<Tag2> Tags { get; set; }
    }
}