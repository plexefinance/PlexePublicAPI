using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class ContractSign
    {
        public string ipAddress { get; set; }
        public string signature { get; set; }
        public string signature2 { get; set; }
        public string mimeType { get; set; }
        public bool secondaryApplicant { get; set; }
    }
}
