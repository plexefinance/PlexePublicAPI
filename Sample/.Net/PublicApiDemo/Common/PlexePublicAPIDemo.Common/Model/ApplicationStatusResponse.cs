namespace PlexePublicAPIDemo.Common.Model
{
    public class ApplicationStatusResponse
    {
        public bool Draft { get; set; }
        public bool CustomerContacted { get; set; }
        public bool DataProviderConnected { get; set; }
        public bool GeneratingOffer { get; set; }
        public bool UnderReview { get; set; }
        public bool OfferAccepted { get; set; }
        public bool ApplicantDetailsAdded { get; set; }
        public bool ApplicationSubmitted { get; set; }
        public bool ContractComplete { get; set; }
        public bool ApplicationCompleted { get; set; }
        public bool Cancelled { get; set; }
    }
}
