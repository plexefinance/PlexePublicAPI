using System.Collections.Generic;
namespace PlexePublicAPIDemo.Common.Model
{
    public class Application
    {
        public string FirstName { get; set; }
        public string LastName { get; set; }
        public string Mobile { get; set; }
        public string Email { get; set; }
        public List<Acknowledgement> Acknowledgements { get; set; }
        public string Abn { get; set; }
        public string BusinessName { get; set; }
        public string TradingName { get; set; }
        public string PartnerId { get; set; }
        public string AcnType { get; set; }
        public string AcnNumber { get; set; }
        public ExtraInformation ExtraInformation { get; set; }
    }
}
