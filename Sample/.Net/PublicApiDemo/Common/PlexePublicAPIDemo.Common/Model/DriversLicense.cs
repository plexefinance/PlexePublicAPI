using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class DriversLicense
    {
        public string issuingState { get; set; }
        public string cardNumber { get; set; }
        public DateTime expiryDate { get; set; }
        public string name { get; set; }
        public string address { get; set; }
        public DateTime dateOfBirth { get; set; }
        public string image { get; set; }
        public string city { get; set; }
    }
}
