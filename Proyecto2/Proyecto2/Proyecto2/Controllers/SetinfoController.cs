using FireSharp.Config;
using FireSharp.Interfaces;
using FireSharp.Response;
using Newtonsoft.Json;
using Proyecto2.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Cryptography;
using System.Text;
using System.Web;
using System.Web.Http;
using System.Web.Mvc;

namespace Proyecto2.Controllers
{
    public class SetinfoController : ApiController
    {
        public String Post([FromBody] UsuerInfo datos)
        {


            IFirebaseConfig config = new FirebaseConfig
            {
                AuthSecret = "wxWlRJ2FHNnX17OmzsXaqyCo2f2JRYeXgP8m14k5",
                BasePath = "https://alumnosws-default-rtdb.firebaseio.com/"
            };

            IFirebaseClient client;
            client = new FireSharp.FirebaseClient(config);
            FirebaseResponse resp;

            if (client != null)
            {
                resp = client.Get("usuarios/" + datos.user);
                if (resp.Body != "null")
                {
                    MD5CryptoServiceProvider md5 = new MD5CryptoServiceProvider();
                    md5.ComputeHash(ASCIIEncoding.ASCII.GetBytes(datos.pass));
                    byte[] result = md5.Hash;

                    StringBuilder strBuilder = new StringBuilder();
                    for (int i = 0; i < result.Length; i++)
                    {
                        //change it into 2 hexadecimal digits  
                        //for each byte  
                        strBuilder.Append(result[i].ToString("x2"));
                    }

                    if (resp.Body.Trim('"') == strBuilder.ToString())
                    {

                        resp = client.Get("usuarios_info/" + datos.AuxUse + "/");

                        if (resp.Body == "null")
                        {
                            resp = client.Get("usuarios_info/" + datos.user);
                            Usuario usuario = resp.ResultAs<Usuario>();
                            Usuario obj = usuario;
                            if (obj.rol == "rh")
                            {
                                

                                if (datos.JUser.correo != "null" || datos.JUser.nombre != "null" || datos.JUser.rol != "null" || datos.JUser.telefono != "null")
                                {
                                    client.Set("usuarios_info/" + datos.AuxUse, datos.JUser);
                                    resp = client.Get("respuestas/402");
                                    DateTime now = DateTime.Now;
                                    return JsonConvert.SerializeObject(new Respuesta() { Code = "402", Data = now.ToString("F"), Message = resp.Body, Status = "" });
                                }
                                else
                                {
                                    resp = client.Get("respuestas/305");
                                    return JsonConvert.SerializeObject(new Respuesta() { Code = "305", Data = "NULL", Message = resp.Body, Status = "" });
                                }
                            }
                            else
                            {
                                resp = client.Get("respuestas/504");
                                return JsonConvert.SerializeObject(new Respuesta() { Code = "504", Data = "NULL", Message = resp.Body, Status = "" });
                            }
                        }
                        else
                        {
                            resp = client.Get("respuestas/508");
                            return JsonConvert.SerializeObject(new Respuesta() { Code = "508", Data = "NULL", Message = resp.Body, Status = "" });
                        }
                    }
                    else
                    {
                        resp = client.Get("respuestas/501");
                        return JsonConvert.SerializeObject(new Respuesta() { Code = "501", Data = "NULL", Message = resp.Body, Status = "" });
                    }
                }
                else
                {
                    resp = client.Get("respuestas/500");
                    return JsonConvert.SerializeObject(new Respuesta() { Code = "500", Data = "NULL", Message = resp.Body, Status = "ERROR" });
                }
            }
            else
            {
                resp = client.Get("respuestas/666");
                return JsonConvert.SerializeObject(new Respuesta() { Code = "666", Data = "NULL", Message = resp.Body, Status = "ERROR" });
            }
        }


    }
}
