using System;
namespace PlexePublicAPIDemo.Common.Model
{   
    public class Customer
    {
        public string Email { get; set; }
        public string FirstName { get; set; }
        public string LastName { get; set; }
        public string MobileNumber { get; set; }
        public string BusinessName { get; set; }
        public string TradingName { get; set; }
        public string Password { get; set; }
        public string Type { get; set; }
        public DateTime DateOfBirth { get; set; }
        public bool HasLoggedIn { get; set; }
    }
}
