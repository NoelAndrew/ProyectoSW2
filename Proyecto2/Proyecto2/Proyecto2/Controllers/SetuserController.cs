using FireSharp.Config;
using FireSharp.Interfaces;
using FireSharp.Response;
using Newtonsoft.Json;
using Proyecto2.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Security.Cryptography;
using System.Text;
using System.Web.Http;

namespace Proyecto2.Controllers
{
    public class SetuserController : ApiController
    {
        
        public String Post([FromBody] AuxUsuarios datos)
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
                    md5.ComputeHash(ASCIIEncoding.ASCII.GetBytes(datos.Npass));
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

                        resp = client.Get("usuarios/" + datos.Nuser);

                        if (resp.Body == "null")
                        {
                            resp = client.Get("usuarios_info/" + datos.user);
                            Usuario usuario = resp.ResultAs<Usuario>();
                            Usuario obj = usuario;
                            if (obj.rol == "rh")
                            {
                                md5 = new MD5CryptoServiceProvider();
                                md5.ComputeHash(ASCIIEncoding.ASCII.GetBytes(datos.pass));
                                result = md5.Hash;
                                strBuilder = new StringBuilder();
                                for (int i = 0; i < result.Length; i++)
                                {
                                    //change it into 2 hexadecimal digits  
                                    //for each byte  
                                    strBuilder.Append(result[i].ToString("x2"));
                                }

                                client.Set("usuarios/" + datos.Nuser + "/", strBuilder.ToString());
                                resp = client.Get("respuestas/404");
                                DateTime now = DateTime.Now;
                                return JsonConvert.SerializeObject(new Respuesta() { Code = "404", Data = now.ToString("F"), Message = resp.Body, Status = "" }); ;
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
    } }
