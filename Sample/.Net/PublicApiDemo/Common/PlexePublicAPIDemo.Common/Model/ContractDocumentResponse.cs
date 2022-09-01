using System;
namespace PlexePublicAPIDemo.Common.Model
{
    public class ContractDocumentResponse
    {
        public string DisplayName { get; set; }
        public DateTime CreatedDate { get; set; }
        public string DocumentId { get; set; }
        public object Data { get; set; }
        public int Status { get; set; }
    }
}
