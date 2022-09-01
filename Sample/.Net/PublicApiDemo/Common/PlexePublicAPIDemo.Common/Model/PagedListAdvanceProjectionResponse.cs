using System.Collections.Generic;

namespace PlexePublicAPIDemo.Common.Model
{
    public class PagedListAdvanceProjectionResponse
    {
        public List<AdvanceProjectionResponse> Data { get; set; }
        public long? TotalCount { get; set; }
    }
}
