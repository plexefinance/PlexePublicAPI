using Newtonsoft.Json;
using PlexePublicAPIDemo.Common.Model;
using RestSharp;
using System;
using System.Collections.Generic;
using System.Net;
using System.Text;

namespace PlexePublicAPIDemo.Common
{
    public class AuthenticationService
    {
        private readonly string BASE_URI = "https://apidemo.plexe.co/";
        private readonly string APPLICATION_URI = "api/Authenication/";
        public UserDatas AuthenticateUser(string username, string password)
        {
            UserDatas userDatas = new UserDatas();
            userDatas = null;
            try
            {
                var client = new RestClient(BASE_URI + APPLICATION_URI + "login?username=" + username + "&password=" + password + "");
                var request = new RestRequest();
                request.Method = Method.Get;
                request.AddHeader("Accept", "application/json");
                RestResponse response = client.Execute(request);
                userDatas = JsonConvert.DeserializeObject<UserDatas>(response.Content);
                return userDatas;
            }
            catch (Exception ex)
            {
                return null;
            }
        }
    }    
}
