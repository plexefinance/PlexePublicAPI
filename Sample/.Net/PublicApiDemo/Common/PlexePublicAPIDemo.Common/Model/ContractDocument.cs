using System;

namespace PlexePublicAPIDemo.Common.Model
{
    public class ContractDocument
    {
        public string DisplayName { get; set; }

        public DateTime CreatedDate { get; set; }

        public Guid DocumentId { get; set; }

        public byte[] Data { get; set; }

        public string Status { get; set; }
    }
}
