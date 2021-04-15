using FireSharp.Config;
using FireSharp.Interfaces;
using FireSharp.Response;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Http;
using System.Web.Mvc;

namespace Proyecto2.Controllers
{
    public class ViewInfoController : ApiController
    {
        public string Get()
        {

            IFirebaseConfig config = new FirebaseConfig
            {
                AuthSecret = "wxWlRJ2FHNnX17OmzsXaqyCo2f2JRYeXgP8m14k5",
                BasePath = "https://alumnosws-default-rtdb.firebaseio.com/"
            };

            IFirebaseClient client;
            client = new FireSharp.FirebaseClient(config);
            FirebaseResponse resp;
            resp = client.Get("usuarios_info/");
            return resp.Body;
        }
    }
}