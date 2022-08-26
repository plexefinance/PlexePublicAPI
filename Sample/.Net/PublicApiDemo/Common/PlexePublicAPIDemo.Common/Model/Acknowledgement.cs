using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    


    // Root myDeserializedClass = JsonConvert.DeserializeObject<Root>(myJsonResponse);
    public class Acknowledgement
    {
        public bool acknowledged { get; set; }
        public string acknowledgementCode { get; set; }
    }

}
