using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class Users
    {
        public string username;
        public string password;
        private int id;
        public UserData UserData;

        public Users(string username, string password, int id)
        {
            this.username = username;
            this.password = password;
            this.id = id;
        }
    }
}
