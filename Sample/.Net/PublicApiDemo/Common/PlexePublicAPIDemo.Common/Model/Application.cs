using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{

    public class Application
    {
        public string firstName { get; set; }
        public string lastName { get; set; }
        public string mobile { get; set; }
        public string email { get; set; }
        public List<Acknowledgement> acknowledgements { get; set; }
        public string abn { get; set; }
        public string businessName { get; set; }
        public string tradingName { get; set; }
        public string partnerId { get; set; }
        public string acnType { get; set; }
        public string acnNumber { get; set; }
        public ExtraInformation extraInformation { get; set; }
    }
}
