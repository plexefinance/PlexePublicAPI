using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class PrimaryApplicantDetails
    {
        public bool isManuallyAdded { get; set; }
        public string name { get; set; }
        public DriversLicense driversLicense { get; set; }
        public bool isPrimary { get; set; }
        public string email { get; set; }
        public string mobile { get; set; }
        public string applicationId { get; set; }
        public MiscellaneousData miscellaneousData { get; set; }
    }
}
