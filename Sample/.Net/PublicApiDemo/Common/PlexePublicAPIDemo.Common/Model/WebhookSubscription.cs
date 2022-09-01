using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class WebhookSubscription
    {
        public string Id { get; set; }
        public string WebhookUri { get; set; }
        public string Secret { get; set; }
        public bool IsActive { get; set; }
        public List<string> Webhooks { get; set; }
    }
}
