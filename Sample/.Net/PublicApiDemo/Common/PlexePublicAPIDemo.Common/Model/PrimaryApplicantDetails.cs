namespace PlexePublicAPIDemo.Common.Model
{
    public class PrimaryApplicantDetails
    {
        public bool IsManuallyAdded { get; set; }
        public string Name { get; set; }
        public DriversLicense DriversLicense { get; set; }
        public bool IsPrimary { get; set; }
        public string Email { get; set; }
        public string Mobile { get; set; }
        public string ApplicationId { get; set; }
        public MiscellaneousData MiscellaneousData { get; set; }
    }
}
