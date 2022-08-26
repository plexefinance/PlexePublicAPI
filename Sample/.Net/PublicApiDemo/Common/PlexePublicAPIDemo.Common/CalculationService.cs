using Newtonsoft.Json;
using PlexePublicAPIDemo.Common.Model;
using RestSharp;
using System;
using System.Collections.Generic;
using System.Net;
using System.Text;

namespace PlexePublicAPIDemo.Common
{
    public class CalculationService
    {
        private readonly string BASE_URI = "https://apidemo.plexe.co/";
        private readonly string APPLICATION_URI = "api/Calculation/";

        public CalculateLOCSliderResponse CalculateLOCSlider(string key, string applicationId)
        {
            CalculateLOCSliderResponse calculateLOCSliderResponse = new CalculateLOCSliderResponse();
            try
            {                
                var client = new RestClient(BASE_URI + APPLICATION_URI + "application-loc-calculation-slider?applicationId=" + applicationId + "");
                var request = new RestRequest();
                request.AddHeader("Content-Type", "application/json");
                request.AddHeader("Accept", "application/json");
                request.AddHeader("Authorization", "Bearer " + key);
                request.Method = Method.Post;
                SliderRequest sliderRequest = new SliderRequest()
                {
                     Amount = 23
                };
                var body = JsonConvert.SerializeObject(sliderRequest);
                request.AddParameter("application/json", body, ParameterType.RequestBody);
                RestResponse response = client.Execute(request);
                calculateLOCSliderResponse = JsonConvert.DeserializeObject<CalculateLOCSliderResponse>(response.Content);
                Console.WriteLine(response.Content);
                return calculateLOCSliderResponse;
            }
            catch (Exception ex)
            {
                return null;
            }
        }
        public ApplicationLocCalculation ApplicationLocCalculation(string key, string applicationId)
        {
            ApplicationLocCalculation applicationLocCalculationResponse = new ApplicationLocCalculation();
            try
            {
                var client = new RestClient(BASE_URI + APPLICATION_URI + "application-loc-calculation?applicationId=" + applicationId + "");
                var request = new RestRequest();
                request.AddHeader("Content-Type", "application/json");
                request.AddHeader("Accept", "application/json");
                request.AddHeader("Authorization", "Bearer " + key);
                request.Method = Method.Post;
                CalculationRequest calculationRequest = new CalculationRequest()
                {
                    Amount = 23,
                    FixedRepaymentCalculation = true,
                    PercentOfIncome = 2,
                    Terms = 22
                };
                var body = JsonConvert.SerializeObject(calculationRequest);
                request.AddParameter("application/json", body, ParameterType.RequestBody);
                RestResponse response = client.Execute(request);
                Console.WriteLine(response.Content);
                applicationLocCalculationResponse = JsonConvert.DeserializeObject<ApplicationLocCalculation>(response.Content);
                return applicationLocCalculationResponse;
            }
            catch (Exception ex)
            {
                return null;
            }
        }
    }    
}
