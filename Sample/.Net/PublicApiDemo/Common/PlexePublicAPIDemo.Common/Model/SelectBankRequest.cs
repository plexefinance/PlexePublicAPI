using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class SelectBankRequest
    {
        public bool Selected { get; set; }
        public string Name { get; set; }
        public string AccountNumber { get; set; }
        public string Id { get; set; }
        public string Bsb { get; set; }
        public string Balance { get; set; }
        public string Available { get; set; }
        public string AccountHolder { get; set; }
        public string AccountType { get; set; }
        public string Slug { get; set; }
        public bool Enabled { get; set; }
        public bool Archived { get; set; }
        public string AccountId { get; set; }
    }
}
