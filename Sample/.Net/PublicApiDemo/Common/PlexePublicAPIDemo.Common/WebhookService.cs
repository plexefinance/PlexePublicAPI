using Newtonsoft.Json;
using PlexePublicAPIDemo.Common.Model;
using RestSharp;
using System;
using System.Collections.Generic;
using System.Net;
using System.Text;

namespace PlexePublicAPIDemo.Common
{
    public class WebhookService
    {
        private readonly string BASE_URI = "https://apidemo.plexe.co/";
        private readonly string WEBHOOK_URI = "api/Webhook/";

        public bool RegisterWebhook(string key, string partnerId,string customerId)
        {
            try
            {
                var client = new RestClient(BASE_URI + WEBHOOK_URI + "register?partnerId=" + partnerId + "&customerId=" + customerId + "");
                var request = new RestRequest();
                request.Method = Method.Post;
                request.AddHeader("Content-Type", "application/json");
                request.AddHeader("Accept", "application/json");
                request.AddHeader("Authorization", "Bearer " + key + "");


                WebhookSubscription webhookSubscription = new WebhookSubscription()
                {
                    id ="",
                    isActive =true,
                    secret ="",
                    webhooks = new List<string>() { "", "", "" },
                    webhookUri = ""
                };


                var body = JsonConvert.SerializeObject(webhookSubscription);
                request.AddParameter("application/json", body, ParameterType.RequestBody);
                RestResponse response = client.Execute(request);
                Console.WriteLine(response.Content);
                Console.WriteLine(Environment.NewLine + response.Content);                
                return true;
            }
            catch (Exception ex)
            {
                return false;
            }
        }
    }
}
