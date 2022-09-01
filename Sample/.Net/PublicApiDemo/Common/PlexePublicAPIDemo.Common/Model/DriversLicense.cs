using System;
namespace PlexePublicAPIDemo.Common.Model
{
    public class DriversLicense
    {
        public string IssuingState { get; set; }
        public string CardNumber { get; set; }
        public DateTime ExpiryDate { get; set; }
        public string Name { get; set; }
        public string Address { get; set; }
        public DateTime DateOfBirth { get; set; }
        public string Image { get; set; }
        public string City { get; set; }
    }
}
