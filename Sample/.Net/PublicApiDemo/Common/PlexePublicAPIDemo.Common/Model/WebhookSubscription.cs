using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class WebhookSubscription
    {
        public string id { get; set; }
        public string webhookUri { get; set; }
        public string secret { get; set; }
        public bool isActive { get; set; }
        public List<string> webhooks { get; set; }
    }
}
