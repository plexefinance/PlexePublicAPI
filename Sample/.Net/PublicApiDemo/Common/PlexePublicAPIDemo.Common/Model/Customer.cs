using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
   
    public class Customer
    {
        public string email { get; set; }
        public string firstName { get; set; }
        public string lastName { get; set; }
        public string mobileNumber { get; set; }
        public string businessName { get; set; }
        public string tradingName { get; set; }
        public string password { get; set; }
        public string type { get; set; }
        public DateTime dateOfBirth { get; set; }
        public bool hasLoggedIn { get; set; }
    }
}
