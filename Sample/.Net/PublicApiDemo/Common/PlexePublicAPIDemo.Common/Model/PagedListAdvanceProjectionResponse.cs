using System;
using System.Collections.Generic;
using System.Text;

namespace PlexePublicAPIDemo.Common.Model
{
    public class PagedListAdvanceProjectionResponse
    {
        public object contentType { get; set; }
        public object serializerSettings { get; set; }
        public object statusCode { get; set; }
        public PagedListAdvanceProjectionResponseValue value { get; set; }
    }
    public class PagedListAdvanceProjectionResponseValue
    {
        public List<AdvanceProjectionResponse> Data { get; set; }
        public long? TotalCount { get; set; }
    }
}
