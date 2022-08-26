using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{

    public class UserData
    {
        public string firstName { get; set; }
        public string lastName { get; set; }
        public string id { get; set; }
        public string email { get; set; }
        public string username { get; set; }
        public string userType { get; set; }
        public string token { get; set; }
        public string expiresUTC { get; set; }
        public bool requiresTwoFactor { get; set; }
    }
}
