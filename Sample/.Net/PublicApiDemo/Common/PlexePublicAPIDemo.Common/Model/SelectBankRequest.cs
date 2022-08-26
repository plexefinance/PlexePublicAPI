using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class SelectBankRequest
    {
        public bool selected { get; set; }
        public string name { get; set; }
        public string accountNumber { get; set; }
        public string id { get; set; }
        public string bsb { get; set; }
        public string balance { get; set; }
        public string available { get; set; }
        public string accountHolder { get; set; }
        public string accountType { get; set; }
        public string slug { get; set; }
        public bool enabled { get; set; }
        public bool archived { get; set; }
        public string accountId { get; set; }
    }
}
